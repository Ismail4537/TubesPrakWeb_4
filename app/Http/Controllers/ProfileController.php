<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $listEvent = $user->events()->where('user_id', $user->id)->get();
        return view('front-page.user.profile', compact('user', 'listEvent'), ['title' => 'User Profile']);
    }

    public function creator(){
        $user = Auth::user();
        $listEvent = $user->events()->where('creator_id', $user->id)->get();
        return view('front-page.user.profile', compact('user', 'listEvent'), ['title' => 'User Profile']);
    }

    public function edit(){
        $user = Auth::user();
        return view('front-page.user.edit', compact('user'), ['title' => 'Edit Profile']);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:15',
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
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        if ($request->input('remove_photo') == 'on') {
            // Hapus foto profil
            if (Auth::user()->profile_photo_path != null) {
                Storage::delete('public/' . Auth::user()->profile_photo_path);
            }
            $imagePath = null;
        } else {
            if (Auth::user()->profile_photo_path != null) 
            {
                $imagePath = Auth::user()->profile_photo_path;
            } else {
                $imagePath = null;
            }
            if ($request->hasFile('photo')) {
                Storage::delete('public/' . $imagePath);
                $imagePath = $request->file('photo')->store('post-images', 'public');
            }
        }
    
        $profile = User::find(Auth::id());
        $profile->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'profile_photo_path' => $imagePath,
            'role' => $request->role,
        ]);
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
