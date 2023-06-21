<?php

namespace App\Models;

class Review extends AppModel
{
    protected $fillable = ['user_id', 'product_id', 'rating', 'review', 'status'];

    public static $rules = [
        'rating' => 'required',
        'review' => 'required',
    ];

    public function images() {
        return $this->hasMany(ReviewImage::class)->select('id', 'review_id', 'image');
    }

}
