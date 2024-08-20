<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssetType::create([
            'icon' => 'asset/university.png',
            'name' => 'Perguruan Tinggi',
            'slug' => 'perguruan-tinggi',
            'description' => 'Perguruan tinggi yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukiitnggi',
            'meta_title' => 'Perguruan Tinggi',
            'meta_description' => 'Perguruan tinggi yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukiitnggi',
            'meta_keywords' => 'Perguruan Tinggi, PDM, Kota Bukittinggi',
        ]);

        AssetType::create([
            'icon' => 'asset/school.png',
            'name' => 'Sekolah',
            'slug' => 'sekolah',
            'description' => 'Sekolah yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukiitnggi',
            'meta_title' => 'Sekolah',
            'meta_description' => 'Sekolah yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukiitnggi',
            'meta_keywords' => 'Sekolah, PDM, Kota Bukittinggi',
        ]);


        AssetType::create([
            'icon' => 'asset/hospital.png',
            'name' => 'Rumah Sakit',
            'slug' => 'rumah-sakit',
            'description' => 'Rumah sakit yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukiitnggi',
            'meta_title' => 'Rumah Sakit',
            'meta_description' => 'Rumah sakit yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukiitnggi',
            'meta_keywords' => 'Rumah Sakit, PDM, Kota Bukittinggi',
        ]);

        AssetType::create([
            'icon' => 'asset/mosque.png',
            'name' => 'Masjid',
            'slug' => 'masjid',
            'description' => 'Masjid yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukittinggi',
            'meta_title' => 'Masjid',
            'meta_description' => 'Masjid yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukittinggi',
            'meta_keywords' => 'Masjid, PDM, Kota Bukittinggi',
        ]);

        Asset::create([
            'name' => 'Universitas Muhammadiyah Bukittinggi',
            'description' => 'Universitas Muhammadiyah Bukittinggi adalah perguruan tinggi yang dimiliki oleh pimpinan daerah muhammadiyah (PDM) Kota Bukittinggi',
            'address' => 'Jl. Raya Koto Tangah, Koto Tangah, Kec. Guguk Panjang, Kota Bukittinggi, Sumatera Barat 26137',
            'latitude' => '-0.3033',
            'longitude' => '100.3703',
            'phone' => '0752-22158',
            'email' => 'umsb@example.com',
            'website' => 'https://umsb.ac.id',
            'facebook' => 'https://facebook.com/umsb',
            'instagram' => 'https://instagram.com/umsb',
            'twitter' => 'https://twitter.com/umsb',
            'youtube' => 'https://youtube.com/umsb',
            'linkedin' => 'https://linkedin.com/umsb',
            'asset_type_id' => 1,
        ]);
        
    }
}
