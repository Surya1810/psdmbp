<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $document = Document::create([
            'number' => '0001/SP/PPS/X/2024',
            'name' => 'Surat Penawaran RFID PT. Partnership Procurement Solution',
            'user_id' => '3',
            'tag_id' => '1',
        ]);
    }
}
