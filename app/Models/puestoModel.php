<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puestoModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'puestos_reporte';
}
