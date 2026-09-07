<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Portfolio;
use App\Models\Client;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\JobPosting;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('status', true)->orderBy('display_order', 'asc')->get();
        $technologies = Technology::where('is_featured', true)->get()->groupBy('category');
        $portfolios = Portfolio::where('status', true)->where('is_featured', true)->take(6)->get();
        $clients = Client::where('status', true)->orderBy('display_order', 'asc')->get();
        $testimonials = Testimonial::where('status', true)->take(6)->get();

        return view('frontend.home', compact(
            'services',
            'technologies',
            'portfolios',
            'clients',
            'testimonials'
        ));
    }
}
