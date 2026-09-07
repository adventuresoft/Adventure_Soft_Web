@extends('layouts.app')

@section('title', 'Contact Us & Schedule Discovery Call — Adventure Soft')

@section('content')

<!-- Header Banner (WHITE THEME) -->
<section class="py-20 bg-slate-50 border-b border-slate-200 relative">
    <div class="max-w-7xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 px-3 py-1 rounded-full bg-emerald-100 border border-emerald-200">Let's Connect</span>
        <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 tracking-tight">Start Your Software Project</h1>
        <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto font-normal leading-relaxed">Fill out the form below to connect with our senior enterprise software architects.</p>
    </div>
</section>

<!-- Contact Form & Info Grid -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-8 p-6 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center space-x-3 shadow-sm">
                <svg class="w-6 h-6 shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Left Info Panel -->
            <div class="space-y-8">
                <div class="bg-white p-8 rounded-3xl space-y-6 border border-slate-200 shadow-lg shadow-slate-200/40">
                    <h2 class="font-outfit font-bold text-2xl text-slate-900">Contact Information</h2>
                    
                    <div class="space-y-4 text-sm text-slate-600">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <div>
                                <strong class="block text-slate-900">Global Headquarters</strong>
                                <span>{{ $settings['office_address'] ?? 'J.S Tower- lift 5, Merul Badda, Dhaka-1212' }}</span>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <div>
                                <strong class="block text-slate-900">Official Email</strong>
                                <span>{{ $settings['contact_email'] ?? 'advsoftbd@gmail.com' }}</span>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <div>
                                <strong class="block text-slate-900">Direct Phone</strong>
                                <span>{{ $settings['contact_phone'] ?? '01612302124' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-3xl space-y-4 border border-slate-200 shadow-sm">
                    <h3 class="font-outfit font-bold text-lg text-slate-900">Guaranteed Response SLA</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Our engineering sales team responds to all formal enterprise inquiries within <strong>4 business hours</strong>.
                    </p>
                </div>
            </div>

            <!-- Right Interactive Inquiry Form -->
            <div class="lg:col-span-2 bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-xl">
                <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <h2 class="font-outfit font-bold text-2xl text-slate-900 border-b border-slate-200 pb-4">Schedule Discovery Call & Estimate</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold uppercase text-slate-700 mb-2">Your Full Name *</label>
                            <input type="text" name="name" required value="{{ old('name') }}"
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-emerald-600 text-sm"
                                   placeholder="e.g. John Doe">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase text-slate-700 mb-2">Corporate Email *</label>
                            <input type="email" name="email" required value="{{ old('email') }}"
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-emerald-600 text-sm"
                                   placeholder="john@company.com">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase text-slate-700 mb-2">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-emerald-600 text-sm"
                                   placeholder="+1 (555) 000-0000">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase text-slate-700 mb-2">Company / Organization</label>
                            <input type="text" name="company_name" value="{{ old('company_name') }}"
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-emerald-600 text-sm"
                                   placeholder="Global Tech Corp">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase text-slate-700 mb-2">Requested Service</label>
                            <select name="service_requested" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 focus:outline-none focus:border-emerald-600 text-sm">
                                <option value="Enterprise Custom Software">Enterprise Custom Software</option>
                                <option value="Web Application Engineering">Web Application Engineering</option>
                                <option value="Mobile App Development">Mobile App Development</option>
                                <option value="Cloud Infrastructure & DevOps">Cloud Infrastructure & DevOps</option>
                                <option value="AI & Machine Learning Solutions">AI & Machine Learning Solutions</option>
                                <option value="Software QA & Automation">Software QA & Automation</option>
                                <option value="Dedicated Developer Augmentation">Dedicated Developer Augmentation</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase text-slate-700 mb-2">Estimated Budget Range</label>
                            <select name="estimated_budget" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 focus:outline-none focus:border-emerald-600 text-sm cursor-pointer">
                                <option value="৳ 50,000 - ৳ 1,00,000">৳ 50,000 - ৳ 1,00,000</option>
                                <option value="৳ 1,00,000 - ৳ 3,00,000">৳ 1,00,000 - ৳ 3,00,000</option>
                                <option value="৳ 3,00,000 - ৳ 5,00,000">৳ 3,00,000 - ৳ 5,00,000</option>
                                <option value="৳ 5,00,000 - ৳ 10,00,000">৳ 5,00,000 - ৳ 10,00,000</option>
                                <option value="৳ 10,00,000+ (Enterprise)">৳ 10,00,000+ (Enterprise)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase text-slate-700 mb-2">Project Overview / Scope Description *</label>
                        <textarea name="message" rows="5" required
                                  class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-emerald-600 text-sm"
                                  placeholder="Describe your software goals, desired timeline, or key technical challenges...">{{ request('project') ? 'Inquiry regarding: ' . request('project') : old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 text-white font-bold text-sm shadow-xl shadow-emerald-500/25 hover:scale-105 transition-all">
                        Submit Inquiry & Schedule Call
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
