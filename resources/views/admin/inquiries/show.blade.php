@extends('admin.layouts.admin')

@section('title', 'Inquiry Details')
@section('page-title', 'Review Client Submission')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="glass-panel rounded-2xl p-8 space-y-6">
        <div class="flex items-center justify-between border-b border-gray-800 pb-6">
            <div>
                <h2 class="font-outfit font-bold text-2xl text-white">{{ $inquiry->name }}</h2>
                <p class="text-sm text-gray-400 mt-1">{{ $inquiry->company_name ?? 'Individual Client Inquiry' }}</p>
            </div>
            <form action="{{ route('admin.inquiries.status', $inquiry) }}" method="POST" class="flex items-center space-x-3">
                @csrf
                @method('PATCH')
                <select name="status" onchange="this.form.submit()" class="px-4 py-2 rounded-xl bg-gray-900 border border-gray-700 text-white text-xs font-semibold focus:outline-none">
                    <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>Status: New</option>
                    <option value="in_discussion" {{ $inquiry->status === 'in_discussion' ? 'selected' : '' }}>Status: In Discussion</option>
                    <option value="closed" {{ $inquiry->status === 'closed' ? 'selected' : '' }}>Status: Closed / Won</option>
                    <option value="spam" {{ $inquiry->status === 'spam' ? 'selected' : '' }}>Status: Spam</option>
                </select>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <span class="text-xs uppercase font-semibold text-gray-400">Email Address</span>
                <p class="text-white font-medium mt-1">{{ $inquiry->email }}</p>
            </div>

            <div>
                <span class="text-xs uppercase font-semibold text-gray-400">Phone Number</span>
                <p class="text-white font-medium mt-1">{{ $inquiry->phone ?? 'Not provided' }}</p>
            </div>

            <div>
                <span class="text-xs uppercase font-semibold text-gray-400">Requested Service</span>
                <p class="text-emerald-400 font-semibold mt-1">{{ $inquiry->service_requested ?? 'General IT Inquiry' }}</p>
            </div>

            <div>
                <span class="text-xs uppercase font-semibold text-gray-400">Project Budget</span>
                <p class="text-white font-medium mt-1">{{ $inquiry->estimated_budget ?? 'Not specified' }}</p>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6">
            <span class="text-xs uppercase font-semibold text-gray-400 block mb-3">Client Message / Project Scope</span>
            <div class="p-6 rounded-xl bg-gray-900/80 border border-gray-800 text-gray-200 text-sm whitespace-pre-line leading-relaxed">
                {{ $inquiry->message }}
            </div>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-gray-800">
            <span class="text-xs text-gray-500">Received on: {{ $inquiry->created_at->format('F d, Y at h:i A') }} (IP: {{ $inquiry->ip_address ?? 'Unknown' }})</span>
            <a href="{{ route('admin.inquiries.index') }}" class="px-4 py-2 rounded-xl bg-gray-800 text-gray-300 hover:text-white text-xs">Back to Inquiries List</a>
        </div>
    </div>
</div>
@endsection
