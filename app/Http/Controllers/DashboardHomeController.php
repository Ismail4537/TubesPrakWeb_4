<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;

class DashboardHomeController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCreators = User::has('events')->count();
        $totalEvents = Event::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalEventsScheduled = Event::where('status', 'scheduled')->count();
        $totalEventsOngoing = Event::where('status', 'ongoing')->count();
        $totalEventsCompleted = Event::where('status', 'completed')->count();
        $totalEventsCancelled = Event::where('status', 'cancelled')->count();
        $totalCategories = Category::count();
        return view('dashboard.home', [
            'title' => 'Dashboard',
            'totalUsers' => $totalUsers,
            'totalCreators' => $totalCreators,
            'totalEvents' => $totalEvents,
            'totalEventsScheduled' => $totalEventsScheduled,
            'totalEventsOngoing' => $totalEventsOngoing,
            'totalEventsCompleted' => $totalEventsCompleted,
            'totalEventsCancelled' => $totalEventsCancelled,
            'totalCategories' => $totalCategories,
            'totalAdmins' => $totalAdmins,
        ]);
    }
}
