<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Notifications extends Component
{
    public $message;
    public $hasMessage;
    public $messages;
    public function __construct()
    {
        $this->message = session()->get('notification');
        $this->hasMessage = $this->message !== null;
        $this->messages = $this->hasMessage ? config('app-notifications') : [];
    }

    public function render()
    {
        return view('components.admin.notifications');
    }
}
