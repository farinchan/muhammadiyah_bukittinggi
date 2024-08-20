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

        Asset::create([
            'name' => 'Universitas Andalas',
            'description' => 'Universitas Andalas adalah perguruan tinggi negeri di Kota Padang, Sumatera Barat, Indonesia',
            'address' => 'Kampus Limau Manis, Jl. Limau Manis, Padang, Sumatera Barat 25163',
            'latitude' => '-0.9473',
            'longitude' => '100.4173',
            'phone' => '0751-727000',
            'email' => 'info@unand.ac.id',
            'website' => 'https://unand.ac.id',
            'facebook' => 'https://facebook.com/unand',
            'instagram' => 'https://instagram.com/unand',
            'twitter' => 'https://twitter.com/unand',
            'youtube' => 'https://youtube.com/unand',
            'linkedin' => 'https://linkedin.com/unand',
            'asset_type_id' => 1,
        ]);

        Asset::create([
            'name' => 'Universitas Negeri Padang',
            'description' => 'Universitas Negeri Padang adalah perguruan tinggi negeri di Kota Padang, Sumatera Barat, Indonesia',
            'address' => 'Kampus Air Tawar, Jl. Prof. Dr. Hamka, Padang, Sumatera Barat 25131',
            'latitude' => '-0.897272',
            'longitude' => '100.354272',
            'phone' => '0751-705000',
            'email' => 'info@unp.ac.id',
            'website' => 'https://unp.ac.id',
            'facebook' => 'https://facebook.com/unp',
            'instagram' => 'https://instagram.com/unp',
            'twitter' => 'https://twitter.com/unp',
            'youtube' => 'https://youtube.com/unp',
            'linkedin' => 'https://linkedin.com/unp',
            'asset_type_id' => 1,
        ]);

        Asset::create([
            'name' => 'Universitas Islam Negeri Imam Bonjol',
            'description' => 'Universitas Islam Negeri Imam Bonjol adalah perguruan tinggi negeri di Kota Padang, Sumatera Barat, Indonesia',
            'address' => 'Kampus Simpang Haru, Jl. Imam Bonjol, Padang, Sumatera Barat 25137',
            'latitude' => '-0.8100989270369154',
            'longitude' => '100.37334154680434',
            'phone' => '0751-705000',
            'email' => 'info@uinib.ac.id',
            'website' => 'https://uinib.ac.id',
            'facebook' => 'https://facebook.com/uinib',
            'instagram' => 'https://instagram.com/uinib',
            'twitter' => 'https://twitter.com/uinib',
            'youtube' => 'https://youtube.com/uinib',
            'linkedin' => 'https://linkedin.com/uinib',
            'asset_type_id' => 1,
        ]);

        Asset::create([
            'name' => 'Universitas Bunghatta',
            'description' => 'Universitas Bunghatta adalah perguruan tinggi swasta di Kota Padang, Sumatera Barat, Indonesia',
            'address' => 'Kampus Air Pacah, Jl. Prof. Dr. Hamka, Padang, Sumatera Barat 25131',
            'latitude' => '-0.9066453864034234',
            'longitude' => '100.34470417093685',
            'phone' => '0751-705000',
            'email' => 'info@ubh.ac.id',
            'website' => 'https://ubh.ac.id',
            'facebook' => 'https://facebook.com/ubh',
            'instagram' => 'https://instagram.com/ubh',
            'twitter' => 'https://twitter.com/ubh',
            'youtube' => 'https://youtube.com/ubh',
            'linkedin' => 'https://linkedin.com/ubh',
            'asset_type_id' => 1,
        ]);

        Asset::create([
            'name' => 'Universitas Islam Negeri Sjech M. Djamil Djambek',
            'description' => 'Universitas Islam Negeri Sjech M. Djamil Djambek adalah perguruan tinggi negeri di Kota Bukittinggi, Sumatera Barat, Indonesia',
            'address' => 'Kampus Ganting, Jl. Raya Ganting, Bukittinggi, Sumatera Barat 26115',
            'latitude' => '-0.3217818130015428',
            'longitude' => '100.39779632518409',
            'phone' => '0752-705000',
            'email' => 'info@uinbukittinggi.ac.id',
            'website' => 'https://uinbukittinggi.ac.id',
            'facebook' => 'https://facebook.com/uinbukittinggi',
            'instagram' => 'https://instagram.com/uinbukittinggi',
            'twitter' => 'https://twitter.com/uinbukittinggi',
            'youtube' => 'https://youtube.com/uinbukittinggi',
            'linkedin' => 'https://linkedin.com/uinbukittinggi',
            'asset_type_id' => 1,
        ]);

        Asset::create([
            'name' => 'Masjid Raya Sumatera Barat',
            'description' => 'Masjid Raya Sumatera Barat adalah masjid yang terletak di Kota Padang, Sumatera Barat, Indonesia',
            'address' => 'Jl. Khatib Sulaiman, Padang, Sumatera Barat 25111',
            'latitude' => '-0.9513',
            'longitude' => '100.3543',
            'phone' => '0751-705000',
            'email' => 'info@example.com',
            'website' => 'https://example.com',
            'facebook' => 'https://facebook.com/example',
            'instagram' => 'https://instagram.com/example',
            'twitter' => 'https://twitter.com/example',
            'youtube' => 'https://youtube.com/example',
            'linkedin' => 'https://linkedin.com/example',
            'asset_type_id' => 4,
        ]);
        
    }
}
