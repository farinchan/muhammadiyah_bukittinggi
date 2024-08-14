<?php

namespace Database\Seeders;

use App\Models\SettingWebsite;
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

        $user = User::create([
            'name' => 'Admin Garis Kode',
            'email' => 'office@gariskode.com',
            'password' => bcrypt('password'),
            'status' => 1
        ]);

        $user->assignRole('admin');

        SettingWebsite::create([
            'name' => 'Pimpinan Daerah Muhammadiyah Kabupaten Bukittinggi',
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

        $this->call([
            NewsSeeder::class,
            PengumumanSeeder::class,
            KajianSeeder::class,
        ]);
    }
}
