<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function products() {
        return $this->hasMany(Review::class,'id','product_id');
    }
}
