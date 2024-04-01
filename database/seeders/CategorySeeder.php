<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Comic', 'Novel', 'Fantasy', 'Mecha', 'Mystery', 'Fiction', 'Romance', 'Horor', 'Western'
        ];
        foreach ($data as $value){
            Category::insert([
                'name' => $value
            ]);
        }
    }
}
