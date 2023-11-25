<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Gibby',
            'no_telp' => '0821547298456',
            'gol_darah' => 'A',
            'email' => 'gibby@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
