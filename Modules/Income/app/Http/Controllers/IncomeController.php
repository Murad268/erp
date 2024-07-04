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
    public function __construct(
        protected CrudService $crudService,
        protected IncomeRepository $incomeRepository,
        protected RemoveService $removeService
    ) {}

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->incomeRepository->search($q, $perPage)
            : $this->incomeRepository->paginate($perPage);

        return view('income::index', compact('items', 'q'));
    }

    public function create()
    {
        return view('income::create');
    }

    public function store(IncomeRequest $request)
    {
        return $this->executeSafely(function() use ($request) {
            $data = $request->all();
            $this->crudService->create($this->incomeRepository->getModel(), $data);
            return redirect()->route('income.index')->with('status', 'Gəlir uğurla əlavə edildi.');
        }, 'income.index');
    }

    public function show($id)
    {
        $income = $this->incomeRepository->find($id);
        return view('income::show', compact('income'));
    }

    public function edit($id)
    {
        $income = $this->incomeRepository->find($id);
        return view('income::edit', compact('income'));
    }

    public function update(IncomeRequest $request, $id)
    {
        return $this->executeSafely(function() use ($request, $id) {
            $income = $this->incomeRepository->find($id);
            $data = $request->all();
            $this->crudService->update($income, $data);
            return redirect()->route('income.index')->with('status', 'Gəlir uğurla yeniləndi.');
        }, 'income.index');
    }

    public function destroy($id)
    {
        return $this->executeSafely(function() use ($id) {
            $income = $this->incomeRepository->find($id);
            $this->crudService->delete($income);
            return redirect()->route('income.index')->with('status', 'Gəlir uğurla silindi.');
        }, 'income.index');
    }

    public function delete_selected_items(Request $request)
    {
        return $this->executeSafely(function() use ($request) {
            $models = $this->incomeRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Gəlirlər uğurla silindi.']);
        });
    }
}
