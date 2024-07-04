<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Services\CodeService;
use App\Services\MailService;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Order\Http\Requests\OrderRequest;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Order\Http\Requests\SelectProductRequest;
use Modules\Order\Models\Order;
use Modules\Order\Models\ProductOrder;
use Modules\Order\Repositories\OrderRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Supplier\Repositories\SupplierRepository;

class OrderController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
        protected MailService $mailService,
        protected CrudService $crudService,
        protected OrderRepository $orderRepository,
        protected RemoveService $removeService,
        protected CodeService $codeService,
        protected ProductRepository $productRepository,
        protected CategoryRepository $categoryRepository,
        protected SupplierRepository $supplierRepository
    ) {}

    private function loadCategoriesAndSuppliers()
    {
        return [
            'categories' => $this->categoryRepository->all(),
            'suppliers' => $this->supplierRepository->all()
        ];
    }

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->orderRepository->search($q, $perPage)
            : $this->orderRepository->paginate($perPage);

        return view('order::index', compact('items', 'q'));
    }

    public function create()
    {
        $products = $this->productRepository->all();
        return view('order::create', compact('products'));
    }

    public function store(OrderRequest $request)
    {
        return $this->executeSafely(function() use ($request) {
            $data = $request->except('products');
            $data['order_code'] = $this->codeService->generateRandomCode();
            $this->crudService->create($this->orderRepository->getModel(), $data);
            return redirect()->route('order.index')->with('status', 'Sifariş uğurla yaradıldı.');
        }, 'order.index');
    }

    public function show($id)
    {
        return view('order::show');
    }

    public function edit(Order $order)
    {
        $products = $this->productRepository->all();
        return view('order::edit', compact('order', 'products'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        return $this->executeSafely(function() use ($request, $order) {
            $data = $request->all();
            $this->crudService->update($order, $data);
            return redirect()->route('order.index')->with('status', 'Sifariş uğurla yeniləndi.');
        }, 'order.index');
    }

    public function destroy($id)
    {
        // Destroy method implementation (if needed)
    }

    public function orderList(Request $request, $order_id)
    {
        $filters = [
            'q' => $request->query('q'),
            'supplier' => $request->query('supplier_id'),
            'category' => $request->query('category_id'),
            'method' => $request->query('method')
        ];
        $perPage = 40;

        $data = $this->loadCategoriesAndSuppliers();
        $order = $this->orderRepository->find($order_id);
        $items = $this->productRepository->filter($filters, $perPage, $order);

        $data['order'] = $order;
        $data['items'] = $items;
        return view('order::product.productsList', $data);
    }

    public function addProduct($order_id)
    {
        $order = $this->orderRepository->find($order_id);
        $products = $this->productRepository->all();
        return view('order::product.add-product', compact('order', 'products'));
    }

    public function storeProduct(SelectProductRequest $request, $order_id)
    {
        return $this->executeSafely(function() use ($request, $order_id) {
            $product = $this->productRepository->find($request->product_id);
            $productStock = $product->stock_count;

            if ($productStock < $request->count) {
                return redirect()->back()->with('error', 'Məhsulun kifayət qədər stoku yoxdur.');
            }

            $productOrder = ProductOrder::where('order_id', (int)$order_id)
                ->where('product_id', $request->product_id)
                ->first();

            if ($productOrder) {
                $stock = $productOrder->stock;
                $productOrder->update(['stock' => $stock + $request->count]);
            } else {
                ProductOrder::create([
                    'order_id' => (int)$order_id,
                    'product_id' => $request->product_id,
                    'stock' => $request->count
                ]);
            }

            $newStockCount = $productStock - $request->count;
            $product->update(['stock_count' => $newStockCount]);

            if ($newStockCount < 10) {
                $users = $this->userRepository->all();
                foreach ($users as $user) {
                    $this->mailService->sendMail('emails.stock', [
                        'product_id' =>  $product->id,
                        'product_name' => $product->title,
                        'new_stock_count' => $newStockCount
                    ], $user->email, 'Warning: Məhsulun stoku 10-dan aşağıdır');
                }
            }

            return redirect()->route('order.orderList', $order_id)->with('success', 'Məhsul uğurla sifarişə əlavə edildi.');
        }, 'order.orderList', $order_id);
    }

    public function delete_selected_items(Request $request)
    {
        return $this->executeSafely(function() use ($request) {
            $models = $this->orderRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models, true, 'products');
            return response()->json(['success' => true, 'message' => 'Məhsul uğurla silindi.']);
        });
    }

    public function delete_selected_products(Request $request)
    {
        return $this->executeSafely(function() use ($request) {
            $order = $this->orderRepository->find($request->order);

            foreach ($request->ids as $id) {
                $order->products()->detach($id);
            }
            return response()->json(['success' => true, 'message' => 'Məhsul uğurla silindi.']);
        });
    }
}
