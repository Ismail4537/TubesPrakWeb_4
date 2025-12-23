<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EventReportController extends Controller
{
    /**
     * Display reporting page with events table
     */
    public function index()
    {
        $events = Event::with(['creator', 'category'])
            ->orderBy('start_date_time', 'desc')
            ->get();
        
        return view('reports.events-index', [
            'title' => 'Event Reporting',
            'events' => $events
        ]);
    }
    
    /**
     * Generate PDF report of all events
     */
    public function downloadPDF()
    {
        // Ambil semua data events dari database
        $events = Event::with(['creator', 'category'])
            ->orderBy('start_date_time', 'desc')
            ->get();
        
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'Event Report',
            'date' => date('d F Y'),
            'events' => $events,
            'total_events' => $events->count()
        ];
        
        // Load view dan generate PDF
        $pdf = Pdf::loadView('reports.events-pdf', $data);
        
        // Set paper size dan orientation
        $pdf->setPaper('A4', 'landscape'); // Landscape karena kolom lebih banyak
        
        // Download PDF dengan nama file dinamis
        return $pdf->download('events-report-' . date('Y-m-d') . '.pdf');
    }
    
    /**
     * Preview PDF in browser
     */
    public function viewPDF()
    {
        // Ambil semua data events dari database
        $events = Event::with(['creator', 'category'])
            ->orderBy('start_date_time', 'desc')
            ->get();
        
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'Event Report',
            'date' => date('d F Y'),
            'events' => $events,
            'total_events' => $events->count()
        ];
        
        // Load view dan generate PDF
        $pdf = Pdf::loadView('reports.events-pdf', $data);
        
        // Set paper size dan orientation
        $pdf->setPaper('A4', 'landscape');
        
        // Stream PDF to browser (untuk preview)
        return $pdf->stream('events-report-' . date('Y-m-d') . '.pdf');
    }
}
