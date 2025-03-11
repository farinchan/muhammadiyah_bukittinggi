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
                'title' => 'Muhammadiyah Tetapkan Idul Adha 1445 Jatuh Pada Senin, 17 Juni 2024. inilah Penjelasannya',
                'slug' => 'muhammadiyah-tetapkan-idul-adha-1445-jatuh-pada-senin-17-juni-2024-inilah-penjelasannya',
                'content' => 'Pimpinan Pusat Muhammadiyah telah menetapkan Idul Adha 1445 jatuh pada Senin, 17 Juni 2024. Penetapan ini berdasarkan hasil hisab dan rukyat yang dilakukan oleh Pimpinan Pusat Muhammadiyah.',
                'thumbnail' => 'news/example.png',
                'category_id' => 3,
                'user_id' => 1,
                'status' => 'published',
                'meta_title' => 'Muhammadiyah Tetapkan Idul Adha 1445 Jatuh Pada Senin, 17 Juni 2024. inilah Penjelasannya',
                'meta_description' => 'Pimpinan Pusat Muhammadiyah telah menetapkan Idul Adha 1445 jatuh pada Senin, 17 Juni 2024',
                'meta_keywords' => 'muhammadiyah, idul adha, 1445, senin, 17 juni 2024',
            ]);

        News::create([
            'title' => 'Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi Gelar Rapat Kerja Tahunan',
            'slug' => 'pimpinan-daerah-muhammadiyah-pdm-kota-bukittinggi-gelar-rapat-kerja-tahunan',
            'content' => 'Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi menggelar rapat kerja tahunan di kantor PDM Kota Bukittinggi. Rapat kerja tahunan ini dihadiri oleh seluruh pengurus PDM Kota Bukittinggi.',
            'thumbnail' => 'news/example.png',
            'category_id' => 1,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi Gelar Rapat Kerja Tahunan',
            'meta_description' => 'Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi menggelar rapat kerja tahunan di kantor PDM Kota Bukittinggi',
            'meta_keywords' => 'pdm kota bukittinggi, rapat kerja tahunan',
        ]);

        News::create([
            'title' => 'Ikatan Mahasiswa Muhammadiyah (IMM) Kota Bukittinggi Gelar Kegiatan Donor Darah dan Bakti Sosial',
            'slug' => 'imm-kota-bukittinggi-gelar-kegiatan-donor-darah-dan-bakti-sosial',
            'content' => 'Ikatan Mahasiswa Muhammadiyah (IMM) Kota Bukittinggi menggelar kegiatan donor darah dan bakti sosial di kampus IMM Kota Bukittinggi. Kegiatan ini dihadiri oleh seluruh mahasiswa IMM Kota Bukittinggi.',
            'thumbnail' => 'news/example.png',
            'category_id' => 2,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'IMM Kota Bukittinggi Gelar Kegiatan Donor Darah dan Bakti Sosial',
            'meta_description' => 'Ikatan Mahasiswa Muhammadiyah (IMM) Kota Bukittinggi menggelar kegiatan donor darah dan bakti sosial di kampus IMM Kota Bukittinggi',
            'meta_keywords' => 'imm kota bukittinggi, donor darah, bakti sosial',
        ]);

        News::create([
            'title' => 'Pemuda Muhammadiyah Kota Bukittinggi Gelar Kegiatan Kemanusiaan di Daerah Terpencil',
            'slug' => 'pemuda-muhammadiyah-kota-bukittinggi-gelar-kegiatan-kemanusiaan-di-daerah-terpencil',
            'content' => 'Pemuda Muhammadiyah Kota Bukittinggi menggelar kegiatan kemanusiaan di daerah terpencil. Kegiatan ini dihadiri oleh seluruh anggota Pemuda Muhammadiyah Kota Bukittinggi.',
            'thumbnail' => 'news/example.png',
            'category_id' => 2,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'Pemuda Muhammadiyah Kota Bukittinggi Gelar Kegiatan Kemanusiaan di Daerah Terpencil',
            'meta_description' => 'Pemuda Muhammadiyah Kota Bukittinggi menggelar kegiatan kemanusiaan di daerah terpencil',
            'meta_keywords' => 'pemuda muhammadiyah kota bukittinggi, kemanusiaan, daerah terpencil',
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
