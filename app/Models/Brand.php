<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends AppModel
{
    protected $fillable = ['title','status'];

    public static $rules = [
        'title' => 'required',
    ];
}
