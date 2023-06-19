<?php

namespace App\Models;


class ProductColor extends AppModel
{
    protected $fillable = ['product_id', 'color_id'];

    public function color()
    {
        return $this->belongsTo(Color::class)->select('id', 'color_name', 'color_code');
    }
}
