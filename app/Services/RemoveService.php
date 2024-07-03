<?php

namespace App\Services;

class RemoveService
{
    public function deleteWhereIn($models)
    {
        foreach ($models as $model) {
            $model->delete();
        }
    }
}
