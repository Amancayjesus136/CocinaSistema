<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alcoholismo extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'alcoholismo';
    protected $fillable = [
            
            'tragos',
            'precio_trago',
    ];
}
