<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends AppModel
{
    protected $fillable = ['title', 'short_title', 'status'];

    public static function getSizeList($where = []){
        return self::where("status", 1)->pluck( "short_title", "id")->toArray();
    }

}
