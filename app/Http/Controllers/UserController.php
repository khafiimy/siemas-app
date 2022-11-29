<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('level', '!=', 'Admin Super')->get();
        return view('dashboard.userList', compact('users'));
    }

    public function add()
    {
        return view('dashboard.userTambah');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:3',
        ]);

        $pass = Hash::make($validated['password']);

        User::create([
            'nama' => $request->nama,
            'level' => $request->level,
            'username' => $validated['username'],
            'password' => $pass,
        ]);

        return redirect('/user')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    public function delete($id)
    {
        User::find($id)->delete();

        return redirect('/user')->with('toast_success', 'User Berhasil Dihapus!');
    }
}
