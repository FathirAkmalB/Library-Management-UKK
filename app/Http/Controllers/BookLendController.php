<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLend;
use App\Models\Collection;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookLendController extends Controller
{
    public function BookLend($id)
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Ambil informasi buku yang akan dipinjam
            $book = Book::findOrFail($id);
            $user = auth()->user();

            // Periksa apakah pengguna sudah meminjam book ini sebelumnya
            $isAlreadyBorrowed = BookLend::where('user_id', $user->id)
                ->where('book_id', $book->id)
                ->where('status', 'Lend')
                ->exists();

            if ($isAlreadyBorrowed) {
                return redirect()->back()->with('error', 'You already lend this book.');
            }

            // Lakukan proses peminjaman di sini, misalnya menambahkan record ke tabel peminjaman
            $lend = BookLend::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'lend_date' => now(),
                'return_date' => now()->addDays(14), // Contoh: 14 hari batas peminjaman
                'status' => 'Lend',
            ]);
            $user = auth()->user();
            Collection::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'lend_id' => $lend->id,
            ]);
            // Setelah peminjaman berhasil, mungkin Anda ingin menampilkan pesan sukses
            return redirect()->back()->with('success', 'Peminjaman berhasil.');
        } else {
            // Jika pengguna belum login, redirect ke halaman login dengan pesan
            return redirect()->route('login_user')->with('error', 'Sebelum pinjam, login dulu.');
        }
    }

    public function ReturnBook($id, Request $request)
    {
        // Validasi input
        $request->validate([
            'review' => 'required|max:200', // Komentar harus ada dan maksimal 200 karakter
            'rating' => 'required|integer|between:1,5', // Rating harus ada, berupa angka bulat, dan di antara 1 dan 5
        ]);

        $lend = BookLend::findOrFail($id);

        // Perbarui TanggalPengembalian dan StatusPeminjaman
        $lend->update([
            'lend_date' => now(),
            'status' => 'Return',
        ]);

        // Tambahkan ulasan dan rating
        $bookReview = [
            'user_id' => auth()->user()->id,
            'book_id' => $lend->book_id,
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
            'status' => 0,
        ];

        Rating::create($bookReview);

        // Redirect kembali
        return redirect()->back()->with('success', 'Buku telah dikembalikan.');
    }
}
