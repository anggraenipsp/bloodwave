<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Setsuna F',
            'no_telp' => '082154729848',
            'gol_darah' => 'O',
            'email' => 'mfarabi155@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
