<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Position::create([
            'name' => 'Kepala',
        ]);
        $admin = Position::create([
            'name' => 'Sekretaris',
        ]);
        $staff = Position::create([
            'name' => 'Staff',
        ]);
    }
}
