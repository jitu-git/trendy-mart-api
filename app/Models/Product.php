<?php

namespace App\Models;


class Product extends AppModel
{
    protected $fillable = ['title', 'description', 'category_id', 'price', 'offer_price', 'status'];

    public function category() {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    public function sizes() {
        return $this->hasMany(ProductSize::class)->select('id', 'product_id', 'size_id')->with('size');
    }

    public function colors() {
        return $this->hasMany(ProductColor::class)->select('id', 'product_id', 'color_id')->with('color');
    }

    public function images() {
        return $this->hasMany(ProductImage::class)->select('id', 'product_id', 'image');
    }

    public function storeSize($data) {
        $data = collect($data)->map(function ($size) {
            return new ProductSize(['size_id' => $size]);
        });
        #dd( $data );
        $this->sizes()->saveMany($data);
    }

    public function storeColor($data) {
        $data = collect($data)->map(function ($size) {
            return new ProductColor(['color_id' => $size]);
        });
        $this->colors()->saveMany($data);
    }

    public function storeImages($data) {
        $data = collect($data)->map(function ($size) {
            return new ProductImage(['image' => $size]);
        });
        $this->images()->saveMany($data);
    }

}
