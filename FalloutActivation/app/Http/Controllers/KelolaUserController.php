<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash;

class KelolaUserController extends Controller
{
    public function index()
    {
        // Mengambil semua data pengguna dari database
        $users = User::all();
        return view('kelola')->with('users', $users);
    }

    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Membuat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function edit(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string',
        ]);

        // Mengambil pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Mengupdate data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;

        // Simpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function hapus($id)
    {
        // Menghapus pengguna berdasarkan ID
        User::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus.');
    }
}
