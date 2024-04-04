<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        return view('User.users', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        return redirect()->route('users_tab');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
