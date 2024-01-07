<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'username' => 'rafmul',
           'email' => 'rafmul@gmail.com',
           'password' => bcrypt('123'),
           'status' => 'admin',
           'online' => 'offline',
    ]);

    User::create([
        'username' => 'harits',
        'email' => 'harits@gmail.com',
        'password' => bcrypt('123'),
        'status' => 'admin',
        'online' => 'offline',
    ]);

    User::create([
        'username' => 'nizur',
        'email' => 'nizur@gmail.com',
        'password' => bcrypt('123'),
        'status' => 'admin',
        'online' => 'offline',
    ]);

    User::create([
        'username' => 'raihan',
        'email' => 'raihan@gmail.com',
        'password' => bcrypt('123'),
        'status' => 'admin',
        'online' => 'offline',
    ]);

    User::create([
        'username' => 'Arfin',
        'email' => 'arfin@gmail.com',
        'password' => bcrypt('123'),
        'status' => 'admin',
        'online' => 'offline',
    ]);
    }
}
