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
        $admin = Role::create([
            'name' => 'Admin',
        ]);
        $distributor = Role::create([
            'name' => 'Distributor',
        ]);
        $staff = Role::create([
            'name' => 'User',
        ]);
    }
}