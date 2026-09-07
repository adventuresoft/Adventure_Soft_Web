<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company_name' => 'nullable|string|max:255',
            'service_requested' => 'nullable|string|max:255',
            'estimated_budget' => 'nullable|string|max:100',
            'message' => 'required|string|min:10',
        ]);

        $validated['ip_address'] = $request->ip();
        $validated['status'] = 'new';

        Inquiry::create($validated);

        return back()->with('success', 'Thank you! Your discovery call request & inquiry has been submitted. Our senior architect will contact you within 4 business hours.');
    }
}
