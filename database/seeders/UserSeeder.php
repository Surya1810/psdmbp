<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '3',
            'department_id' => '1',
            'name' => 'Partnership',
            'email' => 'hi@partnership.co.id',
            'password' => bcrypt('123'),
        ]);

        $admin = User::create([
            'role_id' => '2',
            'position_id' => '1',
            'department_id' => '2',
            'name' => 'BMN',
            'email' => 'BMN@gmail.com',
            'password' => bcrypt('123'),
        ]);

        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '3',
            'name' => 'Pengadaan',
            'email' => 'Pengadaan@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '4',
            'name' => 'PPK',
            'email' => 'PPK@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '5',
            'name' => 'Keuangan',
            'email' => 'Keuangan@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '6',
            'name' => 'PUM',
            'email' => 'PUM@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '7',
            'name' => 'Bidang_1',
            'email' => 'Bidang_1@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '8',
            'name' => 'Bidang 2',
            'email' => 'Bidang_2@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '9',
            'name' => 'Bidang 3',
            'email' => 'Bidang_3@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
