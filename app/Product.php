<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Product extends Model
{
    use Resizable;

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function favourite() {
        return $this->hasManyThrough(Favourite::class,self::class,'id','product_id');
    }
}
