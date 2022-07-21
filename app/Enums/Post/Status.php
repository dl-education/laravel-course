<?php

namespace App\Enums\Post;

enum Status : int {
    case DRAFT = 0; 
    case APPROVED = 5; 
    case REJECTED = 10; 

    public function text(){
        return match($this->value){
            self::DRAFT->value => 'Черновик',
            self::APPROVED->value => 'Одобрен',
            self::REJECTED->value => 'Отклонён'
        };
    }
}

/*
    
return match($this->value){
            0 => 'Черновик',
            5 => 'Одобрен',
            10 => 'Отклонён'
        };
*/