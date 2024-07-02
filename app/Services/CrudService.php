<?php

namespace App\Services;
use Illuminate\Http\Request;
class CrudService
{
    public  function update( $model = null, array $data)
    {
        $model->update($data);
    }
}
