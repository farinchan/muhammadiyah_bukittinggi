<?php

namespace Database\Seeders;

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

        $this->call([
            NewsSeeder::class
        ]);
    }
}
