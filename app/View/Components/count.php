<?php

namespace App\View\Components;

use App\Models\Reserva;
use Illuminate\View\Component;

class count extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    
    public function render()
    {
        return view('components.count');
    }

    public function count()
    {
        
        $primeiro = Reserva::all()->where('primeiro_dia', '!=', false)->count();
        $ultimo = Reserva::all()->where('ultimo_dia', '!=', false)->count();

        $quantia = $primeiro + $ultimo;

        return $quantia;
    }
}
