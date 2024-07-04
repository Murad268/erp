<?php

namespace Modules\MenuLinks\Repositories;

use Modules\MenuLinks\Models\Menu;

class MenuLinkRepository
{
    protected $modelClass = Menu::class;


    public function all()
    {
        return $this->modelClass::all();
    }

    public function paginate($perPage)
    {
        return $this->modelClass::paginate($perPage);
    }

    public function search($q, $perPage)
    {
        return $this->modelClass::where('title', 'like', '%' . $q . '%')->orWhere('slug', 'like', '%' . $q . '%')->orWhere('code', 'like', '%' . $q . '%')->paginate($perPage);
    }

    public function find($id)
    {
        return $this->modelClass::findOrFail($id);
    }
    public function findByCode($code)
    {
        return $this->modelClass::where('code', $code);
    }
    public function findWhereInGet(array $data)
    {
        return $this->modelClass::whereIn('id', $data)->get();
    }


    public function getModel()
    {
        return new $this->modelClass();
    }

    public function where($key, $value)
    {
        return $this->modelClass::where($key, $value);
    }
}
