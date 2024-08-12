<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengumuman::create([
            'title' => 'Pengumuman 1',
            'slug' => 'pengumuman-1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'meta_title' => 'Pengumuman 1',
            'meta_description' => 'Pengumuman 1',
            'meta_keywords' => 'pengumuman, pengumuman 1',
            'user_id' => 1,
        ]);

        Pengumuman::create([
            'title' => 'Pengumuman 2',
            'slug' => 'pengumuman-2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'meta_title' => 'Pengumuman 2',
            'meta_description' => 'Pengumuman 2',
            'meta_keywords' => 'pengumuman, pengumuman 2',
            'user_id' => 1,
        ]);
    }
}
