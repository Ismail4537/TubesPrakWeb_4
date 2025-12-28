<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registrant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EventRegistrantController extends Controller
{
    private function authorizeCreatorOrAdmin(Event $event): void
    {
        $user = Auth::user();
        if (!$user) {
            abort(403);
        }

        if ($user->role !== 'admin' && (int) $user->id !== (int) $event->creator_id) {
            abort(403, 'Access denied. Creator/Admin privileges required.');
        }
    }

    public function index(Event $event): View
    {
        $this->authorizeCreatorOrAdmin($event);

        $registrants = Registrant::with('user')
            ->where('event_id', $event->id)
            ->latest('created_at')
            ->get();

        return view('front-page.event.registrants', [
            'title' => 'Pendaftar Event',
            'event' => $event,
            'registrants' => $registrants,
        ]);
    }

    public function destroy(Event $event, User $user, Request $request): RedirectResponse
    {
        $this->authorizeCreatorOrAdmin($event);

        $deleted = DB::table('registrants')
            ->where('event_id', $event->id)
            ->where('user_id', $user->id)
            ->delete();

        if ($deleted < 1) {
            return back()->with('error', 'Pendaftar tidak ditemukan pada event ini.');
        }

        return back()->with('success', 'Pendaftar berhasil dihapus dari event.');
    }
}
