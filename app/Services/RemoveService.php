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
}
