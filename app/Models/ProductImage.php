<?php

namespace App\Models;


class ProductImage extends AppModel
{
    protected $fillable = ['product_id', 'image'];

    public function getImageAttribute($value) {
        if(is_admin()){
            return $value;
        }
        return $value ? asset("storage/{$value}") : null; 
    }
}
