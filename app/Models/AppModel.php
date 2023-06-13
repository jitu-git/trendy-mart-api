<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\History;
use App\Traits\MassAction;

class AppModel extends Model
{
    use HasFactory, MassAction;

     /**
     * Scope a query to only include only active .
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('status', 1);
    }
}
