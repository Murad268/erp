<?php

namespace Modules\Expense\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Expense\Http\Requests\ExpenseRequest;
use Modules\Expense\Repositories\ExpenseRepository;

class ExpenseController extends Controller
{
    public function __construct(public CrudService $crudService, public ExpenseRepository $expenseRepository, public RemoveService $removeService)
    {
    }

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->expenseRepository->search($q, $perPage);
        } else {
            $items = $this->expenseRepository->paginate($perPage);
        }

        return view('expense::index', compact('items', 'q'));
    }

    public function create()
    {
        return view('expense::create');
    }

    public function store(ExpenseRequest $request)
    {
        try {
            $data = $request->all();
            $this->crudService->create($this->expenseRepository->getModel(), $data);
            return redirect()->route('expense.index')->with('status', 'Xərc uğurla əlavə edildi.');
        } catch (\Exception $e) {
            return redirect()->route('expense.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $expense = $this->expenseRepository->find($id);
        return view('expense::show', compact('expense'));
    }

    public function edit($id)
    {
        $expense = $this->expenseRepository->find($id);
        return view('expense::edit', compact('expense'));
    }

    public function update(ExpenseRequest $request, $id)
    {
        try {
            $expense = $this->expenseRepository->find($id);
            $data = $request->all();
            $this->crudService->update($expense, $data);
            return redirect()->route('expense.index')->with('status', 'Xərc uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('expense.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $expense = $this->expenseRepository->find($id);
            $this->crudService->delete($expense);
            return redirect()->route('expense.index')->with('status', 'Xərc uğurla silindi.');
        } catch (\Exception $e) {
            return redirect()->route('expense.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    public function delete_selected_items(Request $request)
    {
        try {
            $models = $this->expenseRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Xərclər uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
