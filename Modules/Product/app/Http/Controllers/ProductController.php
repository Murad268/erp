<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Modules\Product\Repositories\ProductRepository;
use Modules\Supplier\Repositories\SupplierRepository;

class ProductController extends Controller
{
    public function __construct(
        public CrudService $crudService,
        public ProductRepository $productRepository,
        public RemoveService $removeService,
        public CategoryRepository $categoryRepository,
        public SupplierRepository $supplierRepository
    ) {
    }

    public function index(Request $request)
    {
        $filters = [
            'q' => $request->query('q'),
            'supplier' => $request->query('supplier_id'),
            'category' => $request->query('category_id'),
            'method' => $request->query('method')
        ];
        $perPage = 40;
        $items = $this->productRepository->filter($filters, $perPage);

        $categories = $this->categoryRepository->all();
        $suppliers = $this->supplierRepository->all();
        return view('product::index', compact('items', 'filters', 'categories', 'suppliers'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();
        $suppliers = $this->supplierRepository->all();
        return view('product::create', compact('categories', 'suppliers'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $data = $request->all();
            $this->crudService->create($this->productRepository->getModel(), $data);
            return redirect()->route('product.index')->with('status', 'Product successfully created.');
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        return view('product::show');
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->all();
        $suppliers = $this->supplierRepository->all();
        return view('product::edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $data = $request->all();
            $this->crudService->update($product, $data);
            return redirect()->route('product.index')->with('status', 'Product successfully updated.');
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        // Implement destroy functionality if needed
    }

    public function delete_selected_items(Request $request)
    {
        try {
            $models = $this->productRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Product successfully deleted.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
