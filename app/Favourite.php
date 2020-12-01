<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    public function products() {
        return $this->hasMany(Product::class,'id','product_id');
    }
}
