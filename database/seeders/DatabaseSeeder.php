<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Rating;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            BookSeeder::class,
            RatingsSeeder::class,
        ]);

    }
}