<?php

namespace App\View\Components\count;

use App\Models\User;
use Illuminate\View\Component;

class users extends Component
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
        return view('components.count.users');
    }
    
    public function count()
    {
        $users = User::count();
        return $users;
    }
}
