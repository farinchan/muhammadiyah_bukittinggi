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

        pengumuman::create([
            'title' => 'Pemberitahuan Rapat Kerja Tahunan Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi 2024',
            'slug' => 'pemberitahuan-rapat-kerja-tahunan-pimpinan-daerah-muhammadiyah-pdm-kota-bukittinggi-2024',
            'content' => 'Pemberitahuan Rapat Kerja Tahunan Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi 2024. Rapat Kerja Tahunan ini diadakan pada 17 Juni 2024 di Gedung PDM Kota Bukittinggi.',
            'meta_title' => 'Pemberitahuan Rapat Kerja Tahunan Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi 2024',
            'meta_description' => 'Pemberitahuan Rapat Kerja Tahunan Pimpinan Daerah Muhammadiyah (PDM) Kota Bukittinggi 2024',
            'meta_keywords' => 'pemberitahuan, rapat kerja tahunan, rapat kerja tahunan pdm, rapat kerja tahunan pdm kota bukittinggi',
            'user_id' => 1,
        ]);
        
        Pengumuman::create([
            'title' => 'Pemberitahuan Pendataan Ulang Anggota Muhammadiyah Kota Bukittinggi Pada website resmi PDM Kota Bukittinggi',
            'slug' => 'pemberitahuan-pendataan-ulang-anggota-muhammadiyah-kota-bukittinggi-pada-website-resmi-pdm-kota-bukittinggi',
            'content' => 'Pemberitahuan Pendataan Ulang Anggota Muhammadiyah Kota Bukittinggi Pada website resmi PDM Kota Bukittinggi. Pendataan ulang ini dilakukan untuk memperbaharui data anggota Muhammadiyah Kota Bukittinggi.',
            'meta_title' => 'Pemberitahuan Pendataan Ulang Anggota Muhammadiyah Kota Bukittinggi Pada website resmi PDM Kota Bukittinggi',
            'meta_description' => 'Pemberitahuan Pendataan Ulang Anggota Muhammadiyah Kota Bukittinggi Pada website resmi PDM Kota Bukittinggi',
            'meta_keywords' => 'pemberitahuan, pendataan ulang, anggota muhammadiyah, pdm kota bukittinggi',
            'user_id' => 1,
        ]);

        Pengumuman::create([
            'title' => 'Pemberitahuan Pendaftaran Anggota Baru Muhammadiyah Kota Bukittinggi',
            'slug' => 'pemberitahuan-pendaftaran-anggota-baru-muhammadiyah-kota-bukittinggi',
            'content' => 'Pemberitahuan Pendaftaran Anggota Baru Muhammadiyah Kota Bukittinggi. Pendaftaran anggota baru Muhammadiyah Kota Bukittinggi dapat dilakukan melalui website resmi PDM Kota Bukittinggi.',
            'meta_title' => 'Pemberitahuan Pendaftaran Anggota Baru Muhammadiyah Kota Bukittinggi',
            'meta_description' => 'Pemberitahuan Pendaftaran Anggota Baru Muhammadiyah Kota Bukittinggi',
            'meta_keywords' => 'pemberitahuan, pendaftaran anggota baru, anggota baru muhammadiyah, pdm kota bukittinggi',
            'user_id' => 1,
        ]);

    }
}
