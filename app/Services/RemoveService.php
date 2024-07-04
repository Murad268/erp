<?php

namespace App\Services;

class RemoveService
{
    public function deleteWhereIn($models, $isThirdPartRelation=null, $thirdPartRelation=null)
    {
        foreach ($models as $model) {
            $model->delete();
            if ($isThirdPartRelation) {
                $model->$thirdPartRelation()->detach();
            }
        }
    }


    public function deleteWhereInRelation($models, $relation, $relation_name, $delete_id) {
        foreach ($models as $model) {
            $relation::where($relation_name, $model->$delete_id)->delete();
        }
    }
}
