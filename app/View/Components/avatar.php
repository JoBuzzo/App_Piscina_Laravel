<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class avatar extends Component
{

    public $value;
    public $color;
    

    public function __construct($value, $color)
    {
        $this->value = $value;
        $this->color = $color;
    }

    public function render()
    {
        return view('components.avatar');
    }


    public function iniciais()
    {
        
        $nome = explode(' ', $this->value);
        $segundo_nome = (isset($nome)) ? $nome[0] . ' ' . end($nome) : $nome[0];
        $inicais = strstr($segundo_nome, ' ', true)[0] . trim(strstr($segundo_nome, ' ')[1]);
        
        return $inicais;
    }
}
