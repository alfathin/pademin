<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'user',
            'email' => 'user@example.com',
            'password' => 'user',
            'role' => 'user'
        ]);
    }
}