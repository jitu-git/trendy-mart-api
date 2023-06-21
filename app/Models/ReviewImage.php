<?php

namespace App\Models;


class ReviewImage extends AppModel
{
    protected $fillable = ['review_id', 'image'];

    public function getImageAttribute($value) {
        if(is_admin()){
            return $value;
        }
        return $value ? asset("storage/{$value}") : null; 
    }
}
