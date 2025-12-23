<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UserReportController extends Controller
{
    /**
     * Display reporting page with users table
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        
        return view('reports.users-index', [
            'title' => 'User Reporting',
            'users' => $users
        ]);
    }
    
    /**
     * Generate PDF report of all users
     */
    public function downloadPDF()
    {
        // Ambil semua data users dari database
        $users = User::orderBy('created_at', 'desc')->get();
        
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'User Report',
            'date' => date('d F Y'),
            'users' => $users,
            'total_users' => $users->count()
        ];
        
        // Load view dan generate PDF
        $pdf = Pdf::loadView('reports.users-pdf', $data);
        
        // Set paper size dan orientation
        $pdf->setPaper('A4', 'portrait');
        
        // Download PDF dengan nama file dinamis
        return $pdf->download('users-report-' . date('Y-m-d') . '.pdf');
    }
    
    /**
     * Preview PDF in browser
     */
    public function viewPDF()
    {
        // Ambil semua data users dari database
        $users = User::orderBy('created_at', 'desc')->get();
        
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'User Report',
            'date' => date('d F Y'),
            'users' => $users,
            'total_users' => $users->count()
        ];
        
        // Load view dan generate PDF
        $pdf = Pdf::loadView('reports.users-pdf', $data);
        
        // Set paper size dan orientation
        $pdf->setPaper('A4', 'portrait');
        
        // Stream PDF to browser (untuk preview)
        return $pdf->stream('users-report-' . date('Y-m-d') . '.pdf');
    }
}
