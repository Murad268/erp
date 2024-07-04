<?php

namespace Modules\UserRole\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\MenuLinks\Repositories\MenuLinkRepository;
use Modules\UserRole\Models\RolePermission;
use Modules\UserRole\Repositories\PermissionRepository;
use Modules\UserRole\Repositories\UserRoleRepository;

class UserPermissionController extends Controller
{
    public function __construct(
        protected MenuLinkRepository $menuLinkRepository,
        protected CrudService $crudService,
        protected UserRoleRepository $userRoleRepository,
        protected PermissionRepository $permissionRepository,
        protected RemoveService $removeService
    ) {}

    public function index($id)
    {
        $role = $this->userRoleRepository->find($id);
        $items = $this->menuLinkRepository->all();
        return view('userrole::permission.index', compact('items', 'id', 'role'));
    }

    public function create($role_id)
    {
        $links = $this->menuLinkRepository->all();
        $permissions = $this->permissionRepository->all();
        $role = $this->userRoleRepository->find($role_id);
        return view('userrole::permission.create', compact('links', 'permissions', 'role_id', 'role'));
    }

    public function store(Request $request, $id): RedirectResponse
    {
        return $this->executeSafely(function() use ($request, $id) {
            $permissions = $request->permission($id);

            foreach ($permissions as $permission) {
                $data = [
                    'role_id' => $id,
                    'permission_id' => $permission,
                    'page_id' => $request->page_id
                ];
                $this->crudService->create(new RolePermission(), $data);
            }

            return redirect()->route('permission.list', $id)->with('status', 'İcazə əlavə edildi.');
        }, 'permission.list');
    }



    public function edit($id, $page_id)
    {
        $permissions = $this->permissionRepository->all();
        $page = $this->menuLinkRepository->find($page_id);
        return view('userrole::permission.edit', compact('permissions', 'id', 'page', 'page_id'));
    }

    public function update(Request $request, $id, $page_id): RedirectResponse
    {
        return $this->executeSafely(function() use ($request, $id, $page_id) {
            $page = $this->menuLinkRepository->find($page_id);

            if (!$page) {
                return redirect()->route('permission.list', $id)->with(['error' => 'Səhifə tapılmadı.']);
            }

            RolePermission::where('role_id', $id)->where('page_id', $page_id)->delete();

            $permissions = $request->permission;

            foreach ($permissions as $permission) {
                $data = [
                    'role_id' => $id,
                    'permission_id' => $permission,
                    'page_id' => $request->page_id
                ];
                $this->crudService->create(new RolePermission(), $data);
            }

            return redirect()->route('permission.list', $id)->with('status', 'İcazələr yeniləndi.');
        }, 'permission.list');
    }

    public function destroy($id)
    {
        // Implement the destroy logic if needed
    }
}
