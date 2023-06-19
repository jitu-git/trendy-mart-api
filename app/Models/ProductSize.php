<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends AppModel
{
    protected $fillable = ['product_id', 'size_id'];

    public function size(){
        return $this->belongsTo(Size::class)->select('id', 'title', 'short_title');
    }
}
