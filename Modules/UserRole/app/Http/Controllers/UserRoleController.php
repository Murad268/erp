<?php

namespace Modules\UserRole\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\Request;
use Modules\UserRole\Http\Requests\UserRoleRequest;
use Modules\UserRole\Models\RolePermission;
use Modules\UserRole\Repositories\PermissionRepository;
use Modules\UserRole\Repositories\UserRoleRepository;

class UserRoleController extends Controller
{
    public function __construct(
        protected CrudService $crudService,
        protected UserRoleRepository $userRoleRepository,
        protected PermissionRepository $permissionRepository,
        protected RemoveService $removeService
    ) {}

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->userRoleRepository->search($q, $perPage)
            : $this->userRoleRepository->paginate($perPage);

        return view('userrole::index', compact('items', 'q'));
    }

    public function create()
    {
        $permissions = $this->permissionRepository->all();
        return view('userrole::create', compact('permissions'));
    }

    public function store(UserRoleRequest $request)
    {
        return $this->executeSafely(function() use ($request) {
            $data = $request->except('permission_id');
            $this->crudService->create($this->userRoleRepository->getModel(), $data, 'permissions', $request->permission_id);
            return redirect()->route('userrole.index')->with('status', 'Rol uğurla yaradıldı.');
        }, 'userrole.index');
    }

    public function show($id)
    {
        return view('userrole::show');
    }

    public function edit($id = null)
    {
        $permissions = $this->permissionRepository->all();
        $userRole = $this->userRoleRepository->find($id);
        return view('userrole::edit', compact('userRole', 'permissions'));
    }

    public function update(UserRoleRequest $request, $id)
    {
        return $this->executeSafely(function() use ($request, $id) {
            $data = $request->except('permission_id');
            $userRole = $this->userRoleRepository->find($id);
            $this->crudService->update($userRole, $data);
            return redirect()->route('userrole.index')->with('status', 'Rol uğurla yeniləndi.');
        }, 'userrole.index');
    }



    public function delete_selected_items(Request $request)
    {
        return $this->executeSafely(function() use ($request) {
            $models = $this->userRoleRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            $this->removeService->deleteWhereInRelation($models, new RolePermission(), 'role_id', 'id');
            return response()->json(['success' => true, 'message' => 'Rol uğurla silindi.']);
        });
    }
}
