<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        // Jika tidak ada role yang ditemukan, maka keluar dari seeder
        if ($roles->isEmpty()) {
            return;
        }

        // Memilih satu role secara acak dari daftar role yang ada
        $randomRole = $roles->random();
        $avatarPath = Storage::disk('public')->putFile('avatar', storage_path('app/public/avatar/' . 'default.jpg'));


        // Membuat seeder untuk user dengan role yang dipilih secara acak
        User::create([
            'username' => 'Admin',
            'password' => Hash::make('123456'),
            'phone' => '084324943234',
            'address' => 'Depok City',
            'avatar' => $avatarPath,
            'status' => 'active',
            'role_id' => 1
        ]);
        User::create([
            'username' => 'user1',
            'password' => Hash::make('123456'),
            'phone' => '084324943234',
            'address' => 'Depok City',
            'avatar' => $avatarPath,
            'status' => 'inactive',
            'role_id' => 2
        ]);
        User::create([
            'username' => 'user2',
            'password' => Hash::make('123456'),
            'phone' => '084324943234',
            'address' => 'Depok City',
            'avatar' => $avatarPath,
            'status' => 'active',
            'role_id' => 2
        ]);
    }
}
