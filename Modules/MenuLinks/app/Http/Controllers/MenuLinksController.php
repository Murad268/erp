<?php

namespace Modules\MenuLinks\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\MenuLinks\Http\Requests\MenuRequest;
use Modules\MenuLinks\Http\Requests\MenuUpdateRequest;
use Modules\Supplier\Http\Requests\SupplierRequest;
use Modules\Supplier\Models\Supplier;
use Modules\MenuLinks\Repositories\MenuLinkRepository;


class MenuLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CrudService $crudService, public MenuLinkRepository $menuLinkRepository, public RemoveService $removeService)
    {
    }
    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->menuLinkRepository->search($q,  $perPage);
        } else {

            $items = $this->menuLinkRepository->paginate($perPage);
        }

        return view('menulinks::index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menulinks::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        try {
            $data = $request->all();
            $this->crudService->create($this->menuLinkRepository->getModel(), $data);
            return redirect()->route('menulinks.index')->with('status', 'Link uğurla yaradıldı.');
        } catch (\Exception $e) {
            return redirect()->route('menulinks.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('menulinks::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menuLink = $this->menuLinkRepository->find($id);
        return view('menulinks::edit', compact('menuLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuUpdateRequest $request, $id)
    {
        $menuLink = $this->menuLinkRepository->find($id);
        try {
            $data = $request->all();
            $this->crudService->update($menuLink, $data);
            return redirect()->route('menulinks.index')->with('status', 'Link uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('menulinks.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
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
            $models = $this->menuLinkRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'success' =>  'Link uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
