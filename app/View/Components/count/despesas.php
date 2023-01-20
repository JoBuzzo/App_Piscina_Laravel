<?php

namespace App\View\Components\count;

use App\Models\Despesa;
use Illuminate\View\Component;

class despesas extends Component
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
        return view('components.count.despesas');
    }

    public function count()
    {
        $despesas = Despesa::count();
        return $despesas;
    }
}
