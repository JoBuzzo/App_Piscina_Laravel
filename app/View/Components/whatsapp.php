<?php

namespace App\View\Components;

use Illuminate\View\Component;

class whatsapp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.whatsapp');
    }

    public function formatar()
    {
        return preg_replace('/[^0-9]/', '', $this->value);
    }
}
