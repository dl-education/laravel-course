<?php
namespace App\Enums\Roles;

enum Status:string
{
    case ADMIN = 'admin';
    case MODER = 'moderator';
    case BLOGER = 'writer';
    case USER = 'user';
}