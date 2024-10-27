<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Department::create([
            'name' => 'Partnership',
        ]);
        $admin = Department::create([
            'name' => 'BMN',
        ]);
        $admin = Department::create([
            'name' => 'Pengadaan',
        ]);
        $admin = Department::create([
            'name' => 'PPK',
        ]);
        $admin = Department::create([
            'name' => 'Keuangan',
        ]);
        $admin = Department::create([
            'name' => 'PUM',
        ]);
        $admin = Department::create([
            'name' => 'Bidang 1',
        ]);
        $admin = Department::create([
            'name' => 'Bidang 2',
        ]);
        $admin = Department::create([
            'name' => 'Bidang 3',
        ]);
    }
}
