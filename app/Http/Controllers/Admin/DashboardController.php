<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Inquiry;
use App\Models\JobApplication;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_services' => Service::count(),
            'total_portfolios' => Portfolio::count(),
            'total_inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
            'total_applications' => JobApplication::count(),
            'pending_applications' => JobApplication::where('status', 'pending')->count(),
        ];

        $recentInquiries = Inquiry::latest()->take(5)->get();
        $recentApplications = JobApplication::with('job')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentApplications'));
    }
}
