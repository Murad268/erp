<?php

namespace Modules\UserRole\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrudService;
use App\Services\RemoveService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\MenuLinks\Repositories\MenuLinkRepository;
use Modules\UserRole\Models\RolePermission;
use Modules\UserRole\Repositories\PermissionRepository;
use Modules\UserRole\Repositories\UserRoleRepository;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        public MenuLinkRepository $menuLinkRepository,
        public CrudService $crudService,
        public UserRoleRepository $userRoleRepository,
        public PermissionRepository $permissionRepository,
        public RemoveService $removeService
    ) {
    }

    public function index($id)
    {
        $role = $this->userRoleRepository->find($id);
        $items = $this->menuLinkRepository->all();
        return view('userrole::permissionList', compact('items', 'id', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($role_id)
    {
        $links = $this->menuLinkRepository->all();
        $permissions = $this->permissionRepository->all();
        $role = $this->userRoleRepository->find($role_id);
        return view('userrole::addpermission', compact('links', 'permissions', 'role_id', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id): RedirectResponse
    {
        try {
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
        } catch (\Exception $e) {
            return redirect()->route('permission.list', $id)->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
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
    public function edit($id, $page_id)
    {
        $permissions = $this->permissionRepository->all();
        $page = $this->menuLinkRepository->find($page_id);
        return view('userrole::permissions_edit', compact('permissions', 'id', 'page', 'page_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, $page_id): RedirectResponse
    {
        try {
            $page = $this->menuLinkRepository->find($page_id);

            if (!$page) {
                return redirect()->route('permission.list', $id)->with(['error' => 'Səhifə tapılmadı.']);
            }

            // Remove all existing permissions for the role
            RolePermission::where('role_id', $id)->where('page_id', $page_id)->delete();

            // Add new permissions
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
        } catch (\Exception $e) {
            return redirect()->route('permission.list', $id)->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Implement the destroy logic if needed
    }
}
