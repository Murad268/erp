<?php

namespace Modules\Invoice\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Invoice\Http\Requests\InvoiceRequest;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Category\Models\Category;
use Modules\Invoice\Repositories\InvoiceRepository;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CrudService $crudService, public InvoiceRepository $invoiceRepository, public RemoveService $removeService)
    {

    }
    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->invoiceRepository->search($q,  $perPage);
        } else {

            $items = $this->invoiceRepository->paginate($perPage);
        }

        return view('invoice::index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoice::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        try {
            $data = $request->all();
            $this->crudService->create($this->invoiceRepository->getModel(), $data);
            return redirect()->route('invoice.index')->with('status', 'Fktrua uğurla yaradıldı.');
        } catch (\Exception $e) {
            return redirect()->route('invoice.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('invoice::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $invoice = $this->invoiceRepository->find($id);
        return view('invoice::edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceRequest $request, $id)
    {
        try {
            $invoice = $this->invoiceRepository->find($id);
            $data = $request->all();
            $this->crudService->update($invoice, $data);
            return redirect()->route('invoice.index')->with('status', 'Faktura uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('invoice.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */



    public function delete_selected_items(Request $request)
    {

        try {
            $models = $this->invoiceRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'success' =>  'Faktura uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
