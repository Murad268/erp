<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Order\Http\Requests\OrderRequest;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Category\Models\Category;
use Modules\Order\Models\Order;
use Modules\Order\Repositories\OrderRepository;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CrudService $crudService, public OrderRepository $orderRepository, public RemoveService $removeService)
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
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        try {
            $data = $request->all();
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
    public function edit(Category $category)
    {
        return view('order::edit', compact('category'));
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


    public function delete_selected_items(Request $request)
    {

        try {
            $models = $this->orderRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'success' =>  'Kateqoriya uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
