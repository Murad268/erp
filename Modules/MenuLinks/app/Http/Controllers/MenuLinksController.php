<?php

namespace Modules\MenuLinks\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\MenuLinks\Http\Requests\MenuRequest;
use Modules\MenuLinks\Http\Requests\MenuUpdateRequest;
use Modules\MenuLinks\Repositories\MenuLinkRepository;

class MenuLinksController extends Controller
{
    public function __construct(
        protected CrudService $crudService,
        protected MenuLinkRepository $menuLinkRepository,
        protected RemoveService $removeService
    ) {}

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->menuLinkRepository->search($q, $perPage)
            : $this->menuLinkRepository->paginate($perPage);

        return view('menulinks::index', compact('items', 'q'));
    }

    public function create()
    {
        return view('menulinks::create');
    }

    public function store(MenuRequest $request)
    {
        return $this->executeSafely(function() use ($request) {
            $data = $request->all();
            $this->crudService->create($this->menuLinkRepository->getModel(), $data);
            return redirect()->route('menulinks.index')->with('status', 'Link uğurla yaradıldı.');
        }, 'menulinks.index');
    }

    public function show($id)
    {
        return view('menulinks::show');
    }

    public function edit($id)
    {
        $menuLink = $this->menuLinkRepository->find($id);
        return view('menulinks::edit', compact('menuLink'));
    }

    public function update(MenuUpdateRequest $request, $id)
    {
        return $this->executeSafely(function() use ($request, $id) {
            $menuLink = $this->menuLinkRepository->find($id);
            $data = $request->all();
            $this->crudService->update($menuLink, $data);
            return redirect()->route('menulinks.index')->with('status', 'Link uğurla yeniləndi.');
        }, 'menulinks.index');
    }

    public function destroy($id)
    {
        // Implement the destroy logic if needed
    }

    public function delete_selected_items(Request $request)
    {
        return $this->executeSafely(function() use ($request) {
            $models = $this->menuLinkRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Link uğurla silindi.']);
        });
    }
}
