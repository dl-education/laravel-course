<?php
namespace App\Enums\Roles;

enum Status:string
{
    case ADMIN = 'admin';
    case MODER = 'moderator';
    case WRITER = 'writer';
    case USER = 'user';
}