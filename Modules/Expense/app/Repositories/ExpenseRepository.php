<?php
namespace Modules\Expense\Repositories;

use Modules\Expense\Models\Expense;

class ExpenseRepository
{
    protected $modelClass = Expense::class;

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
        return $this->modelClass::where('description', 'like', '%' . $q . '%')->paginate($perPage);
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
        return new $this->modelClass();
    }

    public function where($key, $value)
    {
        return $this->modelClass::where($key, $value);
    }
}
