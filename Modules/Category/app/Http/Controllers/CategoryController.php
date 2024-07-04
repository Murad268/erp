<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct(
        protected CrudService $crudService,
        protected CategoryRepository $categoryRepository,
        protected RemoveService $removeService
    ) {}

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->categoryRepository->search($q, $perPage)
            : $this->categoryRepository->paginate($perPage);

        return view('category::index', compact('items', 'q'));
    }

    public function create()
    {
        return view('category::create');
    }

    public function store(CategoryRequest $request)
    {
        return $this->executeSafely(function() use ($request) {
            $data = $request->all();
            $this->crudService->create($this->categoryRepository->getModel(), $data);
            return redirect()->route('category.index')->with('status', 'Kateqoriya uğurla yaradıldı.');
        }, 'category.index');
    }

    public function show($id)
    {
        return view('category::show');
    }

    public function edit(Category $category)
    {
        return view('category::edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        return $this->executeSafely(function() use ($request, $category) {
            $data = $request->all();
            $this->crudService->update($category, $data);
            return redirect()->route('category.index')->with('status', 'Kateqoriya uğurla yeniləndi.');
        }, 'category.index');
    }

    public function destroy($id)
    {
        // Destroy method implementation (if needed)
    }

    public function delete_selected_items(Request $request)
    {
        return $this->executeSafely(function() use ($request) {
            $models = $this->categoryRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Kateqoriya uğurla silindi.']);
        });
    }
}
