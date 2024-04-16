<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
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
        $userRole = Role::all();

        $userData->each(function ($user) use ($userRole) {
            $role = $userRole->where('id', $user->role_id)->first();
            $user->role_name = $role->name;
        });

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
