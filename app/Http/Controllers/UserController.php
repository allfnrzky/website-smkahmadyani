<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'calon_siswa')->latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,guru,siswa',
            'nip' => 'nullable|string|max:255|unique:users,nip',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];

        if ($request->role === 'guru' && $request->filled('nip')) {
            $data['nip'] = $request->nip;
        }

        User::create($data);

        return back()->with('success', 'User berhasil ditambahkan!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        try {
            Excel::import(new UsersImport, $request->file('file'));
            return back()->with('success', 'Data User Berhasil Diimport!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal import: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:admin,guru,siswa',
            'nip' => 'nullable|string|max:255|unique:users,nip,' . $id,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->role === 'guru' && $request->filled('nip')) {
            $data['nip'] = $request->nip;
        } else {
            $data['nip'] = null;
        }

        $user->update($data);

        return back()->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }

    public function destroyBatch(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:users,id',
        ]);

        User::whereIn('id', $request->ids)->delete();

        return back()->with('success', count($request->ids) . ' user berhasil dihapus.');
    }
}
