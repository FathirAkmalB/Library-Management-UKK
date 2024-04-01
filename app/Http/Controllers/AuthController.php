<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login()
    {
        return view('Auth.login_user');
    }


    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active') {
                Session::flash('status', 'Failed!');
                Session::flash('message', 'Your account is not active yet.');
                return redirect('/login');
            }

            $request->session()->regenerate();
            return redirect('dashboard');
        }

        Session::flash('status', 'Failed!');
        Session::flash('message', 'Login invalid');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register()
    {
        return view('Auth.register_user');
    }

    public function registering(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:25'],
            'password' => ['required', 'string', 'min:6'],
            'phone' => ['max:255'],
            'avatar' => ['required'],
            'address' => ['required', 'max:255'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $request->avatar,
            'role_id' => 2
        ]);

        return redirect()->route('login_user');
    }
}
