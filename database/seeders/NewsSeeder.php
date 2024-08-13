<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsComment;
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

        News::create([
            'title' => 'PDM Kota Bukittinggi Gelar Rapat Koordinasi',
            'slug' => 'pdm-kota-bukittinggi-gelar-rapat-koordinasi',
            'content' => 'Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi menggelar rapat koordinasi untuk membahas program kerja tahun 2022. Rapat koordinasi ini dihadiri oleh seluruh pengurus PDM Kota Bukittinggi.',
            'thumbnail' => 'news-thumbnail-1.jpg',
            'category_id' => 1,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'PDM Kota Bukittinggi Gelar Rapat Koordinasi',
            'meta_description' => 'Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi menggelar rapat koordinasi untuk membahas program kerja tahun 2022',
            'meta_keywords' => 'pdm kota bukittinggi, rapat koordinasi, program kerja',
        ]);

        News::create([
            'title' => 'ORTOM Kota Bukittinggi Gelar Lomba Mewarnai',
            'slug' => 'ortom-kota-bukittinggi-gelar-lomba-mewarnai',
            'content' => 'Organisasi Otonom Muhammadiyah (ORTOM) Kota Bukittinggi menggelar lomba mewarnai untuk anak-anak usia dini. Lomba mewarnai ini diikuti oleh ratusan anak dari berbagai sekolah di Kota Bukittinggi.',
            'thumbnail' => 'news-thumbnail-2.jpg',
            'category_id' => 2,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'ORTOM Kota Bukittinggi Gelar Lomba Mewarnai',
            'meta_description' => 'Organisasi Otonom Muhammadiyah (ORTOM) Kota Bukittinggi menggelar lomba mewarnai untuk anak-anak usia dini',
            'meta_keywords' => 'ortom kota bukittinggi, lomba mewarnai, anak usia dini',
        ]);

        NewsComment::create([
            'name' => 'User Test 1',
            'email' => 'test1@example.com',
            'comment' => 'Berita yang sangat menarik, semoga PDM Kota Bukittinggi semakin maju',
            'status' => 'approved',
            'news_id' => 1,
        ]);

        NewsComment::create([
            'name' => 'User Test 2',
            'email' => 'test2@example.com',
            'comment' => 'Aamiiin, semoga PDM Kota Bukittinggi semakin maju dan sukses',
            'status' => 'approved',
            'parent_id' => 1,
            'news_id' => 1,
        ]);

        NewsComment::create([
            'name' => 'User Test 2',
            'email' => 'test2@example.com',
            'comment' => 'Semoga ORTOM Kota Bukittinggi semakin sukses dan semakin banyak kegiatan positif',
            'status' => 'approved',
            'news_id' => 2,
        ]);

        NewsComment::create([
            'name' => 'Office Gariskode',
            'email' => 'office@gariskode.com',
            'comment' => 'Semoga PDM Kota Bukittinggi Semakin Maju dan semakin sukses',
            'status' => 'approved',
            'news_id' => 1,
            'user_id' => 1,
        ]);
    }
}
