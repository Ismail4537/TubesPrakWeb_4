<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContacController extends Controller
{
    public function index() {
        $listContact = User::all();
        $listContact = User::paginate(15)->withQueryString();
        return view('front-page.contac.index', compact('listContact'), ['title' => 'Available Contacts']);
    }

    public function show($id){
        if (Auth::user()) {
            if ($id == Auth::user()->id) {
                return redirect()->route('profile');
            }
        }
        $user = User::findOrFail($id);
        $listEvent = $user->events()->where('creator_id', $user->id)->paginate(6)->withQueryString();
        return view('front-page.contac.show', compact('user', 'listEvent'), ['title' => 'Contact Detail']);
    }
}