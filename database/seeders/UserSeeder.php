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
            'name' => 'Surya Dinarta',
            'email' => 'BMN@gmail.com',
            'password' => bcrypt('123'),
        ]);

        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '3',
            'name' => 'Encep Zainul',
            'email' => 'Pengadaan@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '4',
            'name' => 'Gogon Gorbacep',
            'email' => 'PPK@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '5',
            'name' => 'Dani Nugraha',
            'email' => 'Keuangan@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '6',
            'name' => 'Chuz',
            'email' => 'PUM@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '7',
            'name' => 'Firkie',
            'email' => 'Bidang_1@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '8',
            'name' => 'Hermansyah Sujana',
            'email' => 'Bidang_2@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $admin = User::create([
            'role_id' => '3',
            'position_id' => '1',
            'department_id' => '9',
            'name' => 'Dian Nugraha',
            'email' => 'Bidang_3@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
