<?php

namespace Modules\MenuLinks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MenuLinks\Database\Factories\MenuFactory;
use Modules\UserRole\Models\UserPermissions;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    protected $table = 'menu_links';
    protected static function newFactory(): MenuFactory
    {
        //return MenuFactory::new();
    }
    public function permissions($role_id)
    {
        return $this->belongsToMany(UserPermissions::class, 'role_permissions', 'page_id', 'permission_id')->where('role_id', $role_id);
    }
}
