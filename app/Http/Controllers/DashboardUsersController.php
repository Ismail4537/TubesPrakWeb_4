<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::orderBy('name')
            ->paginate(10);

        return view(
            'dashboard.Admin.users',
            compact('users'),
            ['title' => 'User Management']
        );
    }


    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.Admin.edit_user', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'phone' => 'required|string|max:21',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Nama lengkap wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
                'photo.image' => 'Foto profil harus berupa file gambar.',
                'photo.success' => 'Foto profil berhasil diunggah.',
                'photo.max' => 'Ukuran foto profil maksimal 2MB.',
                'photo.mimes' => 'Foto profil harus berformat jpeg, png, jpg, atau gif.',
                'phone.max' => 'Nomor telepon maksimal 15 karakter.',
                'phone.required' => 'Nomor telepon wajib diisi.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->input('remove_photo') == 'on') {
            // Hapus foto profil
            if ($user->profile_photo_path != null) {
                Storage::delete('public/' . $user->profile_photo_path);
            }
            $imagePath = null;
        } else {
            if ($user->profile_photo_path != null) {
                $imagePath = $user->profile_photo_path;
            } else {
                $imagePath = null;
            }
            if ($request->hasFile('photo')) {
                Storage::delete('public/' . $imagePath);
                $imagePath = $request->file('photo')->store('post-images', 'public');
            }
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'profile_photo_path' => $imagePath,
            // 'role' => $request->role,
        ]);

        return redirect('/dashboard/users')->with('success', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/dashboard/users')->with('success', 'User berhasil dihapus');
    }

    /**
     * AJAX live search for users
     */
    public function search(Request $request)
    {
        $q = $request->query('q');
        $role = $request->query('role');

        $users = User::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($q2) use ($q) {
                    $q2->where('name', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%");
                });
            })
            ->when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->orderBy('name')
            ->limit(20)
            ->get();

        return response()->json([
            'html' => view('dashboard.Admin._users_rows', compact('users'))->render()
        ]);
    }
}
