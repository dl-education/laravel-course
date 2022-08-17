<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Log;
use App\Services\Sms\Vendor\SmsaeroApiV2;

class SMSAero implements SmsSenderInterface
{
    protected SmsaeroApiV2 $engine;

    public function __construct()
    {
        $this->engine = new SmsaeroApiV2('email', 'api_key', 'SIGN');
    }

    public function send(string $phone, string $message) : int
    {
        $res = $this->engine->send($phone, $message);
        Log::alert($res);
        return 1;
    }

    public function status(int $id) : bool
    {
        return !!$this->engine->check_send($id);
    }
}