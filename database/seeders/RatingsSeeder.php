<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratingRecord = [
            ['id' => 1, 'user_id' => 1, 'book_id' => 1, 'review' => 'Wow thats good book ive read', 'rating' => 4, 'status' => 0],
            ['id' => 2, 'user_id' => 1, 'book_id' => 2, 'review' => 'This book is bad, cz too many paper of book is lost', 'rating' => 2, 'status' => 0],
            ['id' => 3, 'user_id' => 2, 'book_id' => 1, 'review' => 'no bullshit insight, all of this book is amazing', 'rating' => 5, 'status' => 0],
        ];

        Rating::insert($ratingRecord);
    }
}
