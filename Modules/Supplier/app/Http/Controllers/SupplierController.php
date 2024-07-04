<?php

namespace Modules\Supplier\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Category\Models\Category;
use Modules\Supplier\Http\Requests\SupplierRequest;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Repositories\SupplierRepository;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CrudService $crudService, public SupplierRepository $supplierRepository, public RemoveService $removeService)
    {
    }
    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->supplierRepository->search($q,  $perPage);
        } else {

            $items = $this->supplierRepository->paginate($perPage);
        }

        return view('supplier::index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {

        try {
            $data = $request->all();
            $this->crudService->create($this->supplierRepository->getModel(), $data);
            return redirect()->route('supplier.index')->with('status', 'Tədarükçü uğurla yaradıldı.');
        } catch (\Exception $e) {
            return redirect()->route('supplier.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('supplier::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier::edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        try {
            $data = $request->all();
            $this->crudService->update($supplier, $data);
            return redirect()->route('supplier.index')->with('status', 'Tədarükçü uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('supplier.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
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
            $models = $this->supplierRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'success' =>  'Tədarükçü uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
