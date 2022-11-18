<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'nao_pago',
        'entrada_um',
        'entrada_dois',
        'completo_um',
        'completo_dois',
    ];
}
