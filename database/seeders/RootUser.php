<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RootUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory is better
        $data = [
            'name' => 'Admin',
            'email' => 'admin@local.local',
            'email_verified_at' => now(),
            'password' => Hash::make('qwerty')
        ];
        
        User::create($data);
    }
}
