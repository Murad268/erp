<?php

namespace Modules\Income\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Income\Database\Factories\IncomeFactory;

class Income extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function newFactory(): IncomeFactory
    {
        //return IncomeFactory::new();
    }
}
