<?php

namespace App\View\Components\Nav;

use App\Enums\Comment\Status as CommentStatus;
use App\View\Components\Nav\SendComment;

class ShowComments extends SendComment
{
    
    public function checkCommentStatus($status)
    {
        return $status == CommentStatus::ACCEPT->value;
    }

    public function render()
    {
        return view('components.nav.show-comments');
    }
}
