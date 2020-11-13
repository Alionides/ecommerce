<?php

namespace App\Traits;

trait ImageTrait {

    public function imggridpic($pic){
    $ext = pathinfo($pic, PATHINFO_EXTENSION);
    $name = rtrim($pic, '.'.$ext);
    return $name.'-imggrid.'.$ext;
    }

}