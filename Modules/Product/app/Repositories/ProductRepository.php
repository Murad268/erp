<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Product;

class ProductRepository
{
    protected $modelClass = Product::class;

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
        return $this->modelClass::where('title', 'like', '%' . $q . '%')
            ->orWhere('description', 'like', '%' . $q . '%')
            ->orWhere('id', 'like', '%' . $q . '%')
            ->paginate($perPage);
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

    public function filter($filters, $perPage, $order = null)
    {
        if($order != null) {
            $query = $order->products()->newQuery();
        } else {
            $query = $this->modelClass::query();
        }


        if (isset($filters['q'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', '%' . $filters['q'] . '%')
                    ->orWhere('description', 'like', '%' . $filters['q'] . '%');
            });
        }

        if (isset($filters['supplier'])) {
            $query->where('supplier_id', $filters['supplier']);
        }

        if (isset($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        if (isset($filters['method']) && $filters['method'] === 'or') {
            // Add OR logic if needed
        } else {
            // Default to AND logic
        }

        return $query->paginate($perPage);
    }
}
