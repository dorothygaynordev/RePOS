<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'rol_usuarios';
}
