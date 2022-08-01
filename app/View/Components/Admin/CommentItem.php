<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class CommentItem extends Component
{
    public object $comment;
    public function __construct(object $comment)
    {
        $this->comment = $comment;
    }

    
    public function render()
    {
        return view('components.admin.comment-item');
    }
}
