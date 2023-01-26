<?php

namespace App\View\Components;

use Illuminate\View\Component;

class avatar extends Component
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.avatar');
    }

    public function avatar()
    {
        
        $nome = explode(' ', auth()->user()->name);
        $segundo_nome = (isset($nome)) ? $nome[0] . ' ' . end($nome) : $nome[0];
        $inicais = strstr($segundo_nome, ' ', true)[0] . trim(strstr($segundo_nome, ' ')[1]);
        
        return $inicais;
    }
}
