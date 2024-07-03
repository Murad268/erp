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
use Modules\Category\Models\Category;
use Modules\Order\Http\Requests\SelectProductRequest;
use Modules\Order\Models\Order;
use Modules\Order\Models\ProductOrder;
use Modules\Order\Repositories\OrderRepository;
use Modules\Product\Models\Product;
use Modules\Product\Repositories\ProductRepository;
use Modules\Supplier\Repositories\SupplierRepository;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public UserRepository $userRepository, public MailService $mailService, public CrudService $crudService, public OrderRepository $orderRepository, public RemoveService $removeService, public CodeService $codeService, public ProductRepository $productRepository, public CategoryRepository $categoryRepository, public SupplierRepository $supplierRepository)
    {
    }
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
        if ($q) {
            $items = $this->orderRepository->search($q,  $perPage);
        } else {

            $items = $this->orderRepository->paginate($perPage);
        }
        return view('order::index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = $this->productRepository->all();

        return view('order::create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        try {
            $data = $request->except('products');
            $data['order_code'] = $this->codeService->generateRandomCode();
            $this->crudService->create($this->orderRepository->getModel(), $data);
            return redirect()->route('order.index')->with('status', 'Kateqoriya uğurla yaradıldı.');
        } catch (\Exception $e) {
            return redirect()->route('order.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('order::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $products = $this->productRepository->all();

        return view('order::edit', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRepository $request, Order $order)
    {
        try {
            $data = $request->all();
            $this->crudService->update($order, $data);
            return redirect()->route('order.index')->with('status', 'Kateqoriya uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('order.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
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
        return view('order::productsList', $data);
    }

    public function addProduct($order_id)
    {
        $order = $this->orderRepository->find($order_id);
        $products = $this->productRepository->all();
        return view('order::add-product', compact('order', 'products'));
    }
    public function storeProduct(SelectProductRequest $request, $order_id)
    {
        try {
            $product = $this->productRepository->find($request->product_id);
            $productStock = $product->stock_count;

            if ($productStock < $request->count) {
                return redirect()->route('order.orderList', $order_id)->with('error', 'Məhsulun kifayət qədər stoku yoxdur.');
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
                    $this->mailService->sendMail('emails.stock', [ 'product_id' =>  $product->id, 'product_name' => $product->title, 'new_stock_count' => $newStockCount],$user->email, 'Warning: Məhsulun stoku 10-dan aşağıdır');
                }
            }

            return redirect()->route('order.orderList', $order_id)->with('success', 'Məhsul uğurla sifarişə əlavə edildi.');
        } catch (\Exception $e) {
            return redirect()->route('order.orderList', $order_id)->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }



    public function delete_selected_items(Request $request)
    {
        try {
            $models = $this->orderRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models, true, 'products');
            return response()->json(['success' => true, 'success' =>  'Məhsul uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    public function delete_selected_products(Request $request)
    {
        try {

            $order = $this->orderRepository->find($request->order);

            foreach ($request->ids as $id) {
                $order->products()->detach($id);
            }
            return response()->json(['success' => true, 'success' =>  'Məhsul uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
