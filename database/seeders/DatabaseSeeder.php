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
        
        // get all the roles from Role enum and create role models
        foreach ([
            'SuperAdmin',
            'Admin',
            'Customer',
            'PropertyOwner',
            'Guest',
        ] as $role) {
            \App\Models\Role::create([
                'name' => $role,
                'description' => $role
            ]);
        }

       $SuperAdmin =  \App\Models\User::factory()->create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@idam.com',
            'password' => bcrypt('SuperAdmin'),
            'role' => '0',
        ],);

        $Admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@idam.com',
            'password' => bcrypt('Admin'),
            'role' => '1',
        ]);

        $SuperAdmin->roles()->attach(0);
        $Admin->roles()->attach(1);
        
    }
}
