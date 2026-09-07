<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceAdminController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('display_order', 'asc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'features' => 'nullable|string', // newline separated
            'display_order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['features'] = $request->filled('features') 
            ? array_filter(array_map('trim', explode("\n", $request->features))) 
            : [];
        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $request->has('status');

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'features' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['features'] = $request->filled('features') 
            ? array_filter(array_map('trim', explode("\n", $request->features))) 
            : [];
        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $request->has('status');

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
