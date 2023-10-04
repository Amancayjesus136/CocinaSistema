<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segundo extends Model
{
    use HasFactory;
    protected $table      =   'segundo';
    protected $primaryKey =   'idSegundos';  

    protected $fillable = [
        'segundos',
        'precio_segundo',
    ];
}
