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
        $avatarPath = Storage::disk('public')->putFile('avatar', storage_path('app/public/avatar/' . 'defaultProfile.png'));



        // $avatarDefaultPath = public_path('storage/avatar/default.jpg');
        // if (!file_exists($avatarDefaultPath)) {
        //     // Pastikan direktori avatar ada sebelum menyimpan file default
        //     if (!file_exists(public_path('storage/avatar'))) {
        //         mkdir(public_path('storage/avatar'), 0755, true);
        //     }
        //     // Copy file default.jpg ke direktori avatar
        //     copy(storage_path('avatar/default.jpg'), $avatarDefaultPath);
        // }

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
