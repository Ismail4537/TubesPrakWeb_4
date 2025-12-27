<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContacController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('search');
        $query = User::query();

        if ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        $listContact = $query->orderBy('name', 'asc')->paginate(15)->withQueryString();
        return view('front-page.contac.index', compact('listContact'), ['title' => 'Available Contacts']);
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $query = User::query();

        if ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        $contacts = $query->orderBy('name', 'asc')->paginate(15)->appends($request->only(['q']));

        $html = view('front-page.contac.partials.cards', ['contacts' => $contacts])->render();
        $pagination = '';
        if ($contacts->hasPages()) {
            $pagination = view('front-page.event.partials.pagination', ['paginator' => $contacts])->render();
        }

        return response()->json([
            'html' => $html,
            'pagination' => $pagination,
            'count' => $contacts->total(),
        ]);
    }

    public function show($id)
    {
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
