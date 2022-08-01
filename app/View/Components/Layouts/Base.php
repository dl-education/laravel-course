<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class base extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $title;

    public function __construct(string $title='Блог')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.base');
    }
}
