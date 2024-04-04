<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexDashboard(){

        $user = Auth::user();
        $userCount = User::count();
        $category = Category::count();

        return view('User.dashboard', ['user' => $user, 'category' => $category, 'userCount' => $userCount]);
    }
    public function indexUsers(){

        $user = Auth::user();
        $userData = User::all();
        // dd($userData);  
        return view('User.users', ['user' => $user, 'userData' => $userData]);
        
    }
    public function indexBookLend(){

        $user = Auth::user();

        return view('User.book_lend', compact('user'));

    }
    public function indexBook(){

        $user = Auth::user();
        $categories = Category::all();

        return view('User.book', ['user' => $user, 'categories' => $categories]);

    }
}
