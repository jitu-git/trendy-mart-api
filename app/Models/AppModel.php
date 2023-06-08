<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\History;
use App\Traits\MassAction;

class AppModel extends Model
{
    use HasFactory, MassAction;
}
