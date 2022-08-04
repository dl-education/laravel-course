<?php

namespace App\View\Components\Admin;

use App\Models\Post as MPost;
use Illuminate\View\Component;

class BaseLayout extends Component
{
    public bool $checkTrash;
    public string $title;
    public function __construct(string $title='Админ панель')
    {
        $this->checkTrash = MPost::onlyTrashed()->get()->isEmpty();
        $this->title = $title;
    }

    
    public function render()
    {
        return view('components.admin.base-layout');
    }
}
