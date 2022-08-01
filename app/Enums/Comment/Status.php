<?php
namespace App\Enums\Comment;

enum Status:int 
{
    case DEFAULT = 0;
    case ACCEPT = 1;
    case DECLINE = 2;
}