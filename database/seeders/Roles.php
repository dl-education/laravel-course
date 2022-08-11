<?php

namespace Database\Seeders;

use App\Models\Roles as ModelsRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsRoles::create(['name' => 'admin', 'description' => 'Администратор сайта']);
        ModelsRoles::create(['name' => 'moderator', 'description' => 'Модератор постов и коментариев']);
        ModelsRoles::create(['name' => 'writer', 'description' => 'Составитель постов']);
        ModelsRoles::create(['name' => 'user', 'description' => 'Обычный пользователь']);
    }
}
