<?php
namespace App\Enums\Roles;

enum Status:string
{
    case ADMIN = 'admin';
    case MODER = 'moderator';
    case WRITER = 'writer';
    case USER = 'user';

    public function text(){
        return match($this->value){
            self::ADMIN->value => 'Админ',
            self::MODER->value => 'Модератор',
            self::WRITER->value => 'Писатель',
            self::USER->value => 'Пользователь'
        };
    }

    public function byId(){
        return match($this->value){
            self::ADMIN->value => 1,
            self::MODER->value => 2,
            self::WRITER->value => 3,
            self::USER->value => 4
        };
    }

}