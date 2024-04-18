<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat beberapa data buku
        $categories = Category::all();

        $books = [
            [
                'book_code' => 'BK001',
                'title' => 'The Intelligent Investor',
                'cover' => 'Intel.png',
                'author' => 'Benjamin Graham',
                'stock' => 10,
                'description' => 'The Intelligent Investor by Benjamin Graham is widely considered the "bible" of value investing. First published in 1949, the book has sold over a million copies and been translated into multiple languages.

                The book delves into the philosophy of value investing, which emphasizes buying stocks at a price below their intrinsic value. Graham teaches investors to conduct thorough fundamental analysis to identify undervalued stocks and then patiently wait for their value to appreciate.',
                'status' => 'available'
            ],
            [
                'book_code' => 'BK002',
                'title' => 'POWER',
                'cover' => 'Power.png',
                'author' => 'Robert Greene',
                'stock' => 15,
                'description' => "The 48 Laws of Power is a controversial bestseller by Robert Greene, first published in 1998. It offers a ruthless and cunning perspective on navigating power dynamics and gaining influence.

                The book isn't a traditional self-help book focused on positive affirmations. Instead, it draws on historical figures and philosophers like Machiavelli, Sun Tzu, and Carl von Clausewitz to present 48 laws that can be used to understand, acquire, and maintain power.",
                'status' => 'available'
            ],
            [
                'book_code' => 'BK003',
                'title' => 'Atomic Habits',
                'cover' => 'Atomic.png',
                'author' => 'James Clear',
                'stock' => 5,
                'description' => 'Atomic Habits by James Clear is a self-improvement book that focuses on the power of small habits. It argues that making tiny, incremental changes can lead to remarkable results over time.

                The book centers around the concept of the "habit loop," a neurological cycle that underlies all habits. By understanding this loop, you can learn to build good habits and break bad ones.',
                'status' => 'not available'
            ],
            [
                'book_code' => 'BK004',
                'title' => 'Filosofi Teras',
                'cover' => 'Filosofi.png',
                'author' => 'Henry Manampiring',
                'stock' => 5,
                'description' => "Filosofi Teras, by Henry Manampiring, is an Indonesian self-help book that introduces readers to the ancient Greek and Roman philosophy of Stoicism. 

                **Modern Stoicism for a Modern Audience:**
                
                * Unlike dusty old philosophy texts, Filosofi Teras uses relatable language and contemporary examples to make Stoic concepts relevant to young people and modern life.
                
                **Focus on Emotional Control:**
                
                * A core theme of Stoicism is finding peace and happiness by accepting what you can't control (external events and other people's behavior) and focusing on what you can (your thoughts and actions). The book likely explores this concept and offers guidance on developing emotional resilience.
                
                **Practical Applications for Everyday Life:**
                
                * Filosofi Teras goes beyond theory, providing exercises and techniques to help readers apply Stoic principles to their daily lives. This practical approach is what makes the book popular.
                
                **Overall, Filosofi Teras is:**
                
                * An accessible introduction to Stoicism for a general audience.
                * A guide to cultivating emotional resilience and inner peace.
                * A practical self-help book with actionable advice for everyday challenges.
                ",
                'status' => 'not available'
            ],
            [
                'book_code' => 'BK005',
                'title' => 'Psychology Of Money',
                'cover' => 'Psychology.png',    
                'author' => 'Morgan Housel',
                'stock' => 5,
                'description' => "The Psychology of Money by Morgan Housel isn't your typical personal finance book. Instead of drowning you in formulas and investment strategies, it dives into the fascinating psychology behind our relationship with money.",
                'status' => 'not available'
            ],
        ];

        // Simpan data buku ke dalam database
        foreach ($books as $book) {
            // Simpan cover buku ke dalam storage
            $randomCategoryId = $categories->random()->id;

            $coverPath = Storage::disk('public')->putFile('cover', storage_path('app/public/cover/' . $book['cover']));
            
            // Buat record buku dalam database
            Book::create([
                'book_code' => $book['book_code'],
                'title' => $book['title'],
                'cover' => $coverPath,
                'author' => $book['author'],
                'category_id' => $randomCategoryId,
                'stock' => $book['stock'],
                'description' => $book['description'],
                'status' => $book['status'],
            ]);
        }
    }

}
