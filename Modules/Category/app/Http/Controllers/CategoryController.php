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
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CrudService $crudService, public CategoryRepository $categoryRepository, public RemoveService $removeService)
    {

    }
    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->categoryRepository->search($q,  $perPage);
        } else {

            $items = $this->categoryRepository->paginate($perPage);
        }

        return view('category::index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $data = $request->all();
            $this->crudService->create(new Category(), $data);
            return redirect()->route('category.index')->with('status', 'Kateqoriya uğurla yaradıldı.');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $data = $request->all();
            $this->crudService->update($category, $data);
            return redirect()->route('category.index')->with('status', 'Kateqoriya uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
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
            $models = $this->categoryRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'success' =>  'Kateqoriya uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
