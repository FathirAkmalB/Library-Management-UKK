<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function indexDashboard()
    {

        $user = Auth::user();
        $userCount = User::count();
        $category = Category::count();

        return view('User.dashboard', ['user' => $user, 'category' => $category, 'userCount' => $userCount]);
    }
    public function indexUsers()
    {

        $user = Auth::user();
        $userRole = Role::all();

        // Ambil data user yang statusnya inactive dan aktif
        $userInactive = User::where('status', 'inactive')
            ->orderBy('created_at', 'desc')
            ->get();
        $userActive = User::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        $userBanned = User::onlyTrashed()->get();

        // Format created_at untuk setiap user
        foreach ($userInactive as $user) {
            $role = $userRole->where('id', $user->role_id)->first();
            $user->role_name = $role->name;

            $formattedCreatedAt = $this->formatCreatedAt($user->created_at);
            // dd($formattedCreatedAt); // Cetak hasil format untuk memeriksa

            // Format created_at
            $user->formatted_created_at = $this->formatCreatedAt($user->created_at);
        }

        foreach ($userActive as $user) {
            $role = $userRole->where('id', $user->role_id)->first();
            $user->role_name = $role->name;

            $formattedCreatedAt = $this->formatCreatedAt($user->created_at);
            // dd($formattedCreatedAt); // Cetak hasil format untuk memeriksa

            // Format created_at
            $user->formatted_created_at = $this->formatCreatedAt($user->created_at);

            // dd($userInactive);
        }

        $userRoleWithNames = $userRole->map(function ($role) {
            $role->role_name = $role->name; // Tambahkan field role_name dan isinya adalah nama peran
            return $role;
        });

        return view('User.users', [
            'user' => $user,
            'userInactive' => $userInactive,
            'userActive' => $userActive,
            'userRole' => $userRoleWithNames,
            'userBanned' => $userBanned
        ]);
    }

    // Fungsi untuk memformat created_at
    private function formatCreatedAt($createdAt)
    {
        $formattedCreatedAt = Carbon::parse($createdAt);
        $now = Carbon::now();

        // Jika lebih dari seminggu
        if ($formattedCreatedAt->diffInDays($now) > 7) {
            return $formattedCreatedAt->format('d F Y'); // Format tanggal, bulan, tahun
        } else {
            return $formattedCreatedAt->format('l, H:i'); // Format hari, waktu
        }
    }

    private function formatDeletedAt($deletedAt)
    {
        $formatedDeletedAt = Carbon::parse($deletedAt);
        $now = Carbon::now();

        // Jika lebih dari seminggu
        if ($formatedDeletedAt->diffInDays($now) > 7) {
            return $formatedDeletedAt->format('d F Y'); // Format tanggal, bulan, tahun
        } else {
            return $formatedDeletedAt->format('l, H:i'); // Format hari, waktu
        }
    }


    public function indexBookLend()
    {

        $user = Auth::user();

        return view('User.book_lend', compact('user'));
    }

    public function indexBook()
    {
        $user = Auth::user();
        $categories = Category::all();

        // Mendapatkan tanggal dari satu minggu yang lalu
        $startDate = Carbon::now()->subWeek();

        // Mendapatkan tanggal hari ini
        $endDate = Carbon::now();

        // Menghitung jumlah buku yang ditambahkan dalam satu minggu terakhir
        $booksAddedThisWeek = Book::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->count();

        $books = Book::latest()->get();

        return view('User.book', [
            'user' => $user,
            'categories' => $categories,
            'books' => $books,
            'booksAddedThisWeek' => $booksAddedThisWeek, // Menyertakan jumlah buku yang ditambahkan dalam satu minggu terakhir ke dalam tampilan
        ]);
    }

    public function indexReview()
    {
        $user = Auth::user();
        $ratings = Rating::with(['user', 'book'])->get();
        
        // Mengumpulkan avatar pengguna dari setiap rating
        $avatars = [];
        foreach ($ratings as $rating) {
            $avatar = $rating->user->avatar;
            // Pastikan avatar tidak kosong sebelum menambahkannya ke dalam array
            if ($avatar) {
                $avatars[] = $avatar;
            }
        }

        // Menggunakan dd() untuk melihat hasil dengan lebih baik
        // dd($avatars);
        
        return view('User.rating', compact('ratings', 'user', 'avatars'));
    }

    public function indexCollection(){
        $user = Auth::user();
        $userCollection = Collection::where('user_id', auth()->id())->get();

        return view('User.collection', ['user' => $user, 'userCollection' => $userCollection]);
    }

}
