<?php

namespace App\Services;
use Illuminate\Http\Request;
class CrudService
{
    public  function create($model, array $data) {
        return $model->create($data);
    }
    public  function update( $model = null, array $data)
    {
        $model->update($data);
    }
}
