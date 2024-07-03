<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CodeService;
use Modules\Order\Http\Requests\OrderRequest;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Category\Models\Category;
use Modules\Order\Models\Order;
use Modules\Order\Repositories\OrderRepository;
use Modules\Product\Repositories\ProductRepository;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CrudService $crudService, public OrderRepository $orderRepository, public RemoveService $removeService, public CodeService $codeService, public ProductRepository $productRepository)
    {
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
            $this->crudService->create($this->orderRepository->getModel(), $data, 'products', $request->products);
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
            $this->crudService->update($order, $data, 'products', $request->products);
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
}
