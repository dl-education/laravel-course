<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin', 'description' => 'Главный по сайту']);
        Role::create(['name' => 'moderator', 'description' => 'Надсмотрщик за писателями']);
        Role::create(['name' => 'writer', 'description' => 'Писатель блога']);
        Role::create(['name' => 'commentator', 'description' => 'Писатель комментов']);
    }
}
