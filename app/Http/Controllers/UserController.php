<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        // dd($request);
        // Validasi input
        $request->validate([
            'username' => ['required', 'string', 'max:25'],
            'password' => ['required', 'string', 'min:6'],
            'phone' => ['max:255'],
            'address' => ['required', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2000'],
            'role_id' => ['required'],
        ]);

        // Buat user baru
        $data = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role_id' => $request->role_id,
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
        $user = User::find($id);
        $userRole = Role::all();

        $userRole->each(function ($role) use ($user) {
            if ($role->id === $user->role_id) {
                $user->role_name = $role->name;
            }
        });


        return view('User.Detail.detail_user', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $userData = Auth::user();
        // dd($userData);

        return view('User.users', ['userData' => $userData, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:25'],
            'password' => ['required', 'string', 'min:6'],
            'phone' => ['max:255'],
            'address' => ['required', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2000'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update user fields
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        if ($request->hasFile('avatar')) {
            $fileName = uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $pathImage = $request->file('avatar')->storeAs('avatar', $fileName, 'public');
            $user->avatar = $pathImage;
        } else {
            // Jika tidak ada file avatar yang diunggah, gunakan avatar default
            $user->avatar = 'avatar/defaultProfile.png';
        }

        $user->save();

        return redirect()->route('user.show', $user->id)->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
     {
         // Temukan user berdasarkan ID
         $user = User::find($id);
     
         // Periksa apakah user ditemukan
         if (!$user) {
             // Jika tidak ditemukan, kembalikan redirect dengan pesan bahwa user tidak ditemukan
             return redirect()->route('users_tab')->with('status', 'success');
         }
     
         // Jika ditemukan, hapus user
         $user->delete();
     
         // Kembalikan redirect dengan pesan bahwa user berhasil dihapus
         return redirect()->route('users_tab')->with('status', 'error');
     }
     


    public function approveUser(string $id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->status = 'active';
            $user->save();
            return redirect()->route('users_tab')->with('status', 'success');
        } else {
            return redirect()->route('users_tab')->with('status', 'error');
        }
    }
}
