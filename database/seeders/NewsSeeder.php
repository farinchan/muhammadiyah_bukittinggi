<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsCategory::create([
            'name' => 'Berita PDM',
            'slug' => 'berita-pdm',
            'description' => 'Memuat berita-berita terbaru dari Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi',
            'meta_title' => 'Berita PDM Kota Bukittinggi',
            'meta_description' => 'Berita-berita terbaru dari Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi',
            'meta_keywords' => 'berita, berita terbaru, berita pdm, berita pdm kota bukittinggi',
        ]);

        NewsCategory::create([
            'name' => 'Berita Ortom',
            'slug' => 'berita-ortom',
            'description' => 'Memuat berita-berita terbaru dari Organisasi Otonom Muhammadiyah (ORTOM) Kota Bukittinggi',
            'meta_title' => 'Berita ORTOM Kota Bukittinggi',
            'meta_description' => 'Berita-berita terbaru dari Organisasi Otonom Muhammadiyah (ORTOM) Kota Bukittinggi',
            'meta_keywords' => 'berita, berita terbaru, berita ortom, berita ortom kota bukittinggi',
        ]);

        NewsCategory::create([
            'name' => 'Putusan',
            'slug' => 'putusan',
            'description' => 'Memuat putusan-putusan Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi',
            'meta_title' => 'Putusan PDM Kota Bukittinggi',
            'meta_description' => 'Putusan-putusan Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi',
            'meta_keywords' => 'putusan, putusan pdm, putusan pdm kota bukittinggi',
        ]);
    }
}
