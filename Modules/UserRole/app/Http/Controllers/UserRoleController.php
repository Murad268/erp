<?php

namespace Modules\UserRole\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Models\Category;
use Modules\UserRole\Http\Requests\UserRoleRequest;
use Modules\UserRole\Models\UserRole;
use Modules\UserRole\Repositories\PermissionRepository;
use Modules\UserRole\Repositories\UserRoleRepository;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public CrudService $crudService, public UserRoleRepository $userRoleRepository, public PermissionRepository $permissionRepository, public RemoveService $removeService)
    {
    }
    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->userRoleRepository->search($q,  $perPage);
        } else {

            $items = $this->userRoleRepository->paginate($perPage);
        }

        return view('userrole::index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = $this->permissionRepository->all();
        return view('userrole::create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRoleRequest $request)
    {
        try {
            $data = $request->except('permission_id');
            $this->crudService->create($this->userRoleRepository->getModel(), $data, 'permissions', $request->permission_id);
            return redirect()->route('userrole.index')->with('status', 'Rol uğurla yaradıldı.');
        } catch (\Exception $e) {
            return redirect()->route('userrole.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('userrole::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permissions = $this->permissionRepository->all();
        $userRole = $this->userRoleRepository->find($id);
        return view('userrole::edit', compact('userRole', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRoleRequest $request, $id)
    {
        try {
            $data = $request->except('permission_id');
            $userRole = $this->userRoleRepository->find($id);
            $this->crudService->update($userRole, $data, 'permissions', $request->permission_id);
            return redirect()->route('userrole.index')->with('status', 'Rol uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('userrole.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
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
            $models = $this->userRoleRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'success' =>  'Rol uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
