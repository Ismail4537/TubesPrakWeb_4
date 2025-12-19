<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $listEvent = $user->events()->where('user_id', $user->id)->get();
        return view('front-page.profile', compact('user', 'listEvent'), ['title' => 'User Profile']);
    }

    public function creator(){
        $user = Auth::user();
        $listEvent = $user->events()->where('creator_id', $user->id)->get();
        return view('front-page.profile', compact('user', 'listEvent'), ['title' => 'User Profile']);
    }
}
