<?php

namespace App\Services;
use Illuminate\Http\Request;
class CrudService
{
    public  function create($model, array $data, $thirdPartRelationName = null, $thirdPartRelation = null) {

        $newData = $model->create($data);
        if($thirdPartRelation) {
            $newData->$thirdPartRelationName()->attach($thirdPartRelation);
        }
    }
    public  function update( $model = null, array $data, $thirdPartRelationName = null, $thirdPartRelation = null)
    {
        $model->update($data);
        if($thirdPartRelation) {
            $model->$thirdPartRelationName()->sync($thirdPartRelation);
        }
    }
}
