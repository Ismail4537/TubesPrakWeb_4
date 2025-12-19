<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContacController extends Controller
{
    public function index() {
        $listContact = User::all();
        return view('front-page.contac.index', compact('listContact'), ['title' => 'Available Contacts']);
    }

    public function show($id){
        if ($id == Auth::user()->id) {
            return redirect()->route('profile');
        }
        $user = User::findOrFail($id);
        $listEvent = $user->events()->where('creator_id', $user->id)->get();
        return view('front-page.contac.show', compact('user', 'listEvent'), ['title' => 'Contact Detail']);
    }
}