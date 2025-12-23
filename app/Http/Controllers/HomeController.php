<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    private function prepareEventData($event) 
    {
        // 1. Tambahkan Slug berdasarkan Judul
        $event['slug'] = Str::slug($event['title']);
        return $event;
    }

    public function index(){
        $topUsers = User::withCount('events')
            ->orderBy('events_count', 'desc')
            ->take(6)
            ->get();

        // Sorotan: event dengan pendaftar terbanyak
        $highlightEvents = Event::withCount('registrants')
            ->orderBy('registrants_count', 'desc')
            ->take(4)
            ->get();

        // Populer: gunakan metrik pendaftar terbanyak (untuk saat ini sama dengan sorotan)
        $popularEvents = Event::withCount('registrants')
            ->orderBy('registrants_count', 'desc')
            ->take(4)
            ->get();

        // Terbaru: berdasarkan waktu mulai terbaru
        $latestEvents = Event::orderBy('start_date_time', 'desc')
            ->take(4)
            ->get();

        // Gratis: harga == 0
        $freeEvents = Event::where('price', 0)
            ->orderBy('start_date_time', 'asc')
            ->take(4)
            ->get();

        return view('front-page.home', [
            'title' => 'Home',
            'topUsers' => $topUsers,
            'highlightEvents' => $highlightEvents,
            'popularEvents' => $popularEvents,
            'latestEvents' => $latestEvents,
            'freeEvents' => $freeEvents,
        ]);
    }
}
