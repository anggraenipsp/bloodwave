<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\LokasiDonorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        LokasiDonorSeeder::class,
        UserSeeder::class,
        UsersTableSeeder::class,
    ]);
    }
}
