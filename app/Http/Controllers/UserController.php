<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userData = User::all();
        // dd($userData);  
        return view('Create.create_user', ['user' => $user, 'userData' => $userData]);
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
        'username' => ['required|unique:users'],
        'password' => ['required'],
        'phone' => ['required'],
        'address' => ['required'],
        'avatar' => ['required'],
        'status' => ['required'],
        'role_id' => ['required']
    ]);

    // Buat user baru
    User::create($request->all());

    return view('User.users', );
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
