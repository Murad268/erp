<?php

namespace Modules\Supplier\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Supplier\Http\Requests\SupplierRequest;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Repositories\SupplierRepository;

class SupplierController extends Controller
{
    public function __construct(
        protected CrudService $crudService,
        protected SupplierRepository $supplierRepository,
        protected RemoveService $removeService
    ) {}

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->supplierRepository->search($q, $perPage)
            : $this->supplierRepository->paginate($perPage);

        return view('supplier::index', compact('items', 'q'));
    }

    public function create()
    {
        return view('supplier::create');
    }

    public function store(SupplierRequest $request)
    {
        return $this->executeSafely(function() use ($request) {
            $data = $request->all();
            $this->crudService->create($this->supplierRepository->getModel(), $data);
            return redirect()->route('supplier.index')->with('status', 'Tədarükçü uğurla yaradıldı.');
        }, 'supplier.index');
    }

    public function show($id)
    {
        return view('supplier::show');
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier::edit', compact('supplier'));
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        return $this->executeSafely(function() use ($request, $supplier) {
            $data = $request->all();
            $this->crudService->update($supplier, $data);
            return redirect()->route('supplier.index')->with('status', 'Tədarükçü uğurla yeniləndi.');
        }, 'supplier.index');
    }

    public function destroy($id)
    {
        // Destroy method implementation (if needed)
    }

    public function delete_selected_items(Request $request)
    {
        return $this->executeSafely(function() use ($request) {
            $models = $this->supplierRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Tədarükçü uğurla silindi.']);
        });
    }
}
