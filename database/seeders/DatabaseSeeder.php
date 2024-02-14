<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@idam.com',
            'password' => bcrypt('SuperAdmin'),
            'role' => '0',
        ]);
        
    }
}
