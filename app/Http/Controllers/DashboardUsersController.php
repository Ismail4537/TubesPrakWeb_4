<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all();
        $users = User::paginate(10)->withQueryString();
        return view('dashboard.Admin.users', compact('users'), ['title' => 'User Management']);
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

        //buat data dummy
        $private = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '123-456-7890',
            'date_of_birth' => '1990-01-01',
            'address' => '123 Main St, Anytown, USA',
        ];  

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date', 
            'address' => 'nullable|string|max:255', 
            

        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // optional fields
        if ($request->filled('phone')) {
            $user->phone = $request->input('phone');
        }
        if ($request->filled('date_of_birth')) {
            $user->date_of_birth = $request->input('date_of_birth');
        }

        $user->save();

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
}