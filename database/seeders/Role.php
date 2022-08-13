<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsRole::create(['name' => 'admin', 'description' => 'Администратор сайта']);
        ModelsRole::create(['name' => 'moderator', 'description' => 'Модератор постов и коментариев']);
        ModelsRole::create(['name' => 'writer', 'description' => 'Составитель постов']);
        ModelsRole::create(['name' => 'user', 'description' => 'Обычный пользователь']);
    }
}
