<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\CategorySeeder;
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

        User::factory()->create([
            'name' => 'Admin 01',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
        ]);

        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
            ProductSeeder::class
        ]);
    }
}
