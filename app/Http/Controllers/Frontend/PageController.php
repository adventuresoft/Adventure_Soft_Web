<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\JobPosting;
use App\Models\SiteSetting;

class PageController extends Controller
{
    public function services()
    {
        $services = Service::where('status', true)->orderBy('display_order', 'asc')->get();
        return view('frontend.services', compact('services'));
    }

    public function serviceShow($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $allServices = Service::where('status', true)->orderBy('display_order', 'asc')->get();
        $relatedServices = Service::where('id', '!=', $service->id)->where('status', true)->take(3)->get();
        $technologies = Technology::all()->groupBy('category');
        
        return view('frontend.services.show', compact('service', 'allServices', 'relatedServices', 'technologies'));
    }

    public function projects()
    {
        $projects = Portfolio::where('status', true)->latest()->get();
        $categories = Portfolio::where('status', true)->distinct()->pluck('category');
        return view('frontend.projects', compact('projects', 'categories'));
    }

    public function projectShow($slug)
    {
        $project = Portfolio::where('slug', $slug)->firstOrFail();
        $relatedProjects = Portfolio::where('id', '!=', $project->id)->where('status', true)->take(3)->get();
        return view('frontend.projects.show', compact('project', 'relatedProjects'));
    }

    public function portfolio()
    {
        return redirect()->route('projects');
    }

    public function technologies()
    {
        $technologies = Technology::all()->groupBy('category');
        return view('frontend.technologies', compact('technologies'));
    }

    public function about()
    {
        $teams = Team::where('status', true)->orderBy('display_order', 'asc')->get();
        return view('frontend.about', compact('teams'));
    }

    public function careers()
    {
        $jobs = JobPosting::where('status', true)->latest()->get();
        return view('frontend.careers', compact('jobs'));
    }

    public function contact()
    {
        $services = Service::where('status', true)->pluck('title');
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        return view('frontend.contact', compact('services', 'settings'));
    }
}
