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
    public function __construct(
        protected CrudService $crudService,
        protected ExpenseRepository $expenseRepository,
        protected RemoveService $removeService
    ) {}

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->expenseRepository->search($q, $perPage)
            : $this->expenseRepository->paginate($perPage);

        return view('expense::index', compact('items', 'q'));
    }

    public function create()
    {
        return view('expense::create');
    }

    public function store(ExpenseRequest $request)
    {
        return $this->executeSafely(function() use ($request) {
            $data = $request->all();
            $this->crudService->create($this->expenseRepository->getModel(), $data);
            return redirect()->route('expense.index')->with('status', 'Xərc uğurla əlavə edildi.');
        }, 'expense.index');
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
        return $this->executeSafely(function() use ($request, $id) {
            $expense = $this->expenseRepository->find($id);
            $data = $request->all();
            $this->crudService->update($expense, $data);
            return redirect()->route('expense.index')->with('status', 'Xərc uğurla yeniləndi.');
        }, 'expense.index');
    }

    public function destroy($id)
    {
        return $this->executeSafely(function() use ($id) {
            $expense = $this->expenseRepository->find($id);
            $this->crudService->delete($expense);
            return redirect()->route('expense.index')->with('status', 'Xərc uğurla silindi.');
        }, 'expense.index');
    }

    public function delete_selected_items(Request $request)
    {
        return $this->executeSafely(function() use ($request) {
            $models = $this->expenseRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Xərclər uğurla silindi.']);
        });
    }
}
