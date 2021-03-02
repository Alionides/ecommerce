<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Product extends Model
{
    use Resizable;

    protected $perPage = 100;

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function favourite() {
        return $this->hasManyThrough(Favourite::class,self::class,'id','product_id');
    }
    public function review() {
        return $this->hasManyThrough(Review::class,self::class,'id','product_id')->orderBy('created_at','desc');
    }

    //this is for category relationsip
    public function reviews() {
        return $this->hasManyThrough(Review::class,self::class,'id','product_id');
    }
}
