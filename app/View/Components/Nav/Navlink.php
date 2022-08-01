<?php

namespace App\View\Components\Nav;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Navlink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $routeName;
    public string $active;


    public function __construct(string $routeName)
    {
        $this->routeName = $routeName;
        $this->active = Route::currentRouteName() == $this->routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav.navlink');
    }

}
