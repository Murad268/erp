<?php

namespace Modules\Product\Models;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Models\Order;
use Modules\Product\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function newFactory(): ProductFactory
    {
        //return ProductFactory::new();
    }

    public function orders()
    {
        return $this->belongsToMany(OrderProduct::class, 'order_id', 'product_id');
    }
}
