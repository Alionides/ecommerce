<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrderProduct extends Model
{
    public function products() {
        return $this->hasMany(Product::class,'id','product_id');
    }
    public function orders() {
        return $this->hasMany(Order::class,'id','order_id');
    }
}
