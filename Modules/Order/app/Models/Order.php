<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Database\Factories\OrderFactory;
use Modules\Product\Models\Product;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function newFactory(): OrderFactory
    {
        //return OrderFactory::new();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders', 'product_id', 'order_id');
    }
}
