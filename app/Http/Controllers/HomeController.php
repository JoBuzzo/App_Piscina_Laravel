<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Models\Reserva;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    function home()
    {
        $reservas = Reserva::all();
        $despesas = Despesa::all();

        $data['reserva'] = [
            'quantia' => $reservas->count(),
            'receber' => $reservas->sum('valor_total'),
            'recebido' => $reservas->sum('valor_pago'),
            'falta' => $reservas->sum('valor_pendente'),
        ];

        $data['despesa'] = [
            'quantia' => $despesas->count(),
            'gasto' => $despesas->sum('valor'),
        ];

     

        $valor = [1 => 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($reservas as $r) {
            for ($i = 1; $i <= 12; $i++) {
                if ((date('m', strtotime($r->primeiro_dia)) == $i)  && (date('Y', strtotime($r->primeiro_dia)) == date('Y'))) {
                    $valor[$i] += $r->valor_pago;
                }
            }
        }
        $data['meses'] = $valor;



        return view('home', $data);
    }
}
