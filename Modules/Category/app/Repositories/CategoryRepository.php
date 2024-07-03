<?php

namespace Modules\Category\Repositories;


use Modules\Category\Models\Category;

class CategoryRepository
{
    protected $modelClass = Category::class;




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
        return $this->modelClass::where('title', 'like', '%' . $q . '%')->paginate($perPage);
    }

    public function find($id)
    {
        return $this->modelClass::findOrFail($id);
    }

    public function findWhereInGet(array $data)
    {
        return $this->modelClass::whereIn('id', $data)->get();
    }

    public function getModel()
    {
        return $this->modelClass;
    }

    public function where($key, $value)
    {
        return $this->modelClass::where($key, $value);
    }
}
