<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            [
                'role_name' => 'Administrator',
                'is_active' => 1,
            ],
            [
                'role_name' => 'Pimpinan',
                'is_active' => 1,
            ],
            [
                'role_name' => 'Kasir',
                'is_active' => 1,
            ],
        ]);
    }
}
