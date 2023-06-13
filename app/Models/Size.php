<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends AppModel
{
    protected $fillable = ['title', 'short_title', 'status'];

    public static $rules = [
        'title' => 'required',
        'short_title' => 'required',
    ];
}
