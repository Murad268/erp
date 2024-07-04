<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\UserRole\Repositories\UserRoleRepository;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public UserRoleRepository $userRoleRepository, public CrudService $crudService, public UserRepository $userRepository, public RemoveService $removeService)
    {
    }
    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->userRepository->search($q,  $perPage);
        } else {

            $items = $this->userRepository->paginate($perPage);
        }

        return view('admin::index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $this->crudService->create($this->userRepository->getModel(), $data);
            return redirect()->route('admin.index')->with('status', 'Rolun uğurla yaradıldı.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = $this->userRoleRepository->all();
        $user = $this->userRepository->find($id);
        return view('admin::edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        try {
            $data = $request->all();
            $this->crudService->update($user, $data);
            return redirect()->route('admin.index')->with('status', 'Rol uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
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
            $models = $this->userRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'success' =>  'Kateqoriya uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
/**
 * Display a listing of the resource.
 */
