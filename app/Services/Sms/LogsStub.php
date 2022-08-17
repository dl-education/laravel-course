<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Log;

class LogsStub implements SmsSenderInterface
{
    public function send(string $phone, string $message) : int
    {
        Log::info("We send sms to / $phone / with message / $message / ");
        return 1;
    }

    public function status(int $id) : bool
    {
        return true;
    }
}