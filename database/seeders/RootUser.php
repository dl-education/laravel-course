<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User as MUser;
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
       $data = [
            'name' => 'Admin',
            'email' => 'jjnn95@yandex.ru',
            'email_verified_at' => now(),
            'password' =>  Hash::make('admin')
        ];

        MUser::create($data);
       
    }
}
