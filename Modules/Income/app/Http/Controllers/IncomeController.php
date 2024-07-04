<?php

namespace Modules\Income\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Income\Http\Requests\IncomeRequest;
use Modules\Income\Repositories\IncomeRepository;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CrudService $crudService, public IncomeRepository $incomeRepository, public RemoveService $removeService)
    {
    }

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->incomeRepository->search($q, $perPage);
        } else {
            $items = $this->incomeRepository->paginate($perPage);
        }

        return view('income::index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeRequest $request)
    {
        try {
            $data = $request->all();
            $this->crudService->create($this->incomeRepository->getModel(), $data);
            return redirect()->route('income.index')->with('status', 'Gəlir uğurla əlavə edildi.');
        } catch (\Exception $e) {
            return redirect()->route('income.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $income = $this->incomeRepository->find($id);
        return view('income::show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $income = $this->incomeRepository->find($id);
        return view('income::edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeRequest $request, $id)
    {
        try {
            $income = $this->incomeRepository->find($id);
            $data = $request->all();
            $this->crudService->update($income, $data);
            return redirect()->route('income.index')->with('status', 'Gəlir uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('income.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $income = $this->incomeRepository->find($id);
            $this->crudService->delete($income);
            return redirect()->route('income.index')->with('status', 'Gəlir uğurla silindi.');
        } catch (\Exception $e) {
            return redirect()->route('income.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    public function delete_selected_items(Request $request)
    {
        try {
            $models = $this->incomeRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Gəlirlər uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
