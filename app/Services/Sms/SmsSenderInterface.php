<?php

namespace App\Services\Sms;

interface SmsSenderInterface
{
    public function send(string $phone, string $message) : int;
    public function status(int $id) : bool;
}