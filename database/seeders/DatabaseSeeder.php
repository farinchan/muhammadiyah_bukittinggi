<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use App\Models\Profile;
use App\Models\SettingBanner;
use App\Models\SettingWebsite;
use App\Models\Subscriber;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();

        $admin =  Role::create(['name' => 'admin']);
        $user =  Role::create(['name' => 'user']);

        $office = User::create([
            'name' => 'Admin Garis Kode',
            'email' => 'office@gariskode.com',
            'password' => bcrypt('password'),
            'status' => 1
        ]);

        $office->assignRole('admin');
        
        $fajri = User::create([
            'name' => 'Fajri Rinaldi Chan',
            'email' => 'fajri@gariskode.com',
            'password' => bcrypt('password'),
            'status' => 1
        ]);

        $fajri->assignRole('user');

        SettingWebsite::create([
            'name' => 'Pimpinan Daerah Muhammadiyah Kabupaten Bukittinggi',
            'logo' => 'setting/logo.png',
            'favicon' => 'setting/favicon.png',
            'email' => 'office@gariskode.com',
            'phone' => '08123456789',
            'address' => '-',
            'latitude' => '-0.3051158430561598',
            'longitude' => '100.36946868126212',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'twitter' => 'https://twitter.com',
            'youtube' => 'https://youtube.com',
            'whatsapp' => 'https://whatsapp.com',
            'telegram' => 'https://telegram.com',
            'linkedin' => 'https://linkedin.com',
            'about' => 'Pimpinan Daerah Muhammadiyah Kota Bukittinggi adalah organisasi Islam yang bergerak dalam bidang sosial, pendidikan, dan kesehatan.',
        ]);

        Profile::create([
            'name' => 'Sejarah',
            'slug' => 'sejarah',
            'content' => '<h2>Sejarah</h2><p>Sejarah Pimpinan Daerah Muhammadiyah Kota Bukittinggi</p><p>lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum</p>',
        ]);

        Profile::create([
            'name' => 'Visi Misi',
            'slug' => 'visi-misi',
            'content' => '<h2>Visi Misi</h2><p>Visi Misi Pimpinan Daerah Muhammadiyah Kota Bukittinggi</p><p>lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum</p>',
        ]);

        SettingBanner::create([
            'title' => 'Pimpinan Daerah Muhammadiyah Kota Bukittinggi',
            'subtitle' => 'Organisasi Islam yang bergerak dalam bidang sosial, pendidikan, dan kesehatan.',
            'image' => 'banner/1725391558_yahaha (1).png',
            'url' => 'https://gariskode.com',
            'status' => 1,
        ]);

        Subscriber::create([
            'email' => 'fajri@gariskode.com',
        ]);

        ContactUs::create([
            'name' => 'Fajri Rinaldi Chan',
            'email' => 'fajri@gariskode.com',
            'subject' => 'Pertanyaan Tentang PDM Bukittinggi',
            'message' => 'lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum',
        ]);

        $this->call([
            NewsSeeder::class,
            PengumumanSeeder::class,
            KajianSeeder::class,
            AssetSeeder::class,
        ]);


    }
}
