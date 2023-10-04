<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;
    protected $table      =   'bebida';
    protected $primaryKey =   'idBebidas';  

    protected $fillable = [
        'gaseosas',
        'precio_bebida',
    ];
}
