<?php

namespace App\View\Components\Admin;

use App\Models\Post as MPost;
use Illuminate\View\Component;

class BaseLayout extends Component
{
    public bool $checkTrash;

    public function __construct()
    {
        $this->checkTrash = MPost::onlyTrashed()->get()->isEmpty();
    }

    
    public function render()
    {
        return view('components.admin.base-layout');
    }
}
