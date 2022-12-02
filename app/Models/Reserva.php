<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'primeiro_dia',
        'ultimo_dia',
        'valor_pago',
        'valor_pendente',
        'valor_total',
    ];
    
}
