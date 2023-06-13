<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends AppModel
{
    protected $fillable = ['color_name', 'color_code', 'status'];

}
