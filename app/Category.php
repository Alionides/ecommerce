<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public function subcategory(){
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function subproducts()
    {
        return $this->hasManyThrough(Product::class, self::class, 'parent_id', 'category_id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
    public function review() {
        return $this->hasManyThrough(Review::class,Product::class,'id','product_id');
    }
}
