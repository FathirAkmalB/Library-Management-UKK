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
       // Validasi input
       $request->validate([
        'username' => ['required', 'string', 'max:25'],
        'password' => ['required', 'string', 'min:6'],
        'phone' => ['max:255'],
        'address' => ['required', 'max:255'],
        'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2000'],
    ]);

    // Buat user baru
    $data = [
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'address' => $request->address,
        'role_id' => 2,
    ];

    // Simpan gambar di direktori 'avatar' di storage public
    if ($request->hasFile('avatar')) {
        $fileName = uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
        $pathImage = $request->file('avatar')->storeAs('avatar', $fileName, 'public');
        $data['avatar'] = $pathImage;
    } else {
        // Jika tidak ada file avatar yang diunggah, gunakan avatar default
        $data['avatar'] = 'avatar/defaultProfile.png';
    }

    User::create($data);
    return redirect()->route('login_user');
    }
}
