@extends('layouts.app')

@section('title', 'Careers & Engineering Opportunities — Adventure Soft')

@section('content')

<!-- Header Banner (WHITE THEME) -->
<section class="py-24 bg-white border-b border-slate-200/80 relative overflow-hidden">
    <!-- Ambient Grid & Soft Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px] opacity-60 pointer-events-none"></div>
    <div class="absolute top-1/4 -right-32 w-96 h-96 bg-emerald-100/40 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-0 -left-32 w-96 h-96 bg-cyan-100/40 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-5 relative z-10">
        <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-xs font-bold uppercase tracking-widest text-emerald-700 shadow-xs">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
            <span>Join Our Team</span>
        </div>
        <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 tracking-tight leading-tight max-w-3xl mx-auto">
            Build the Future with <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">Adventure Soft</span>
        </h1>
        <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto font-normal leading-relaxed">
            We are looking for passionate software engineers, cloud architects, UI/UX designers, and AI specialists to engineer world-class products.
        </p>
    </div>
</section>

<!-- Active Job Openings Grid & Interactive Application Modal -->
<section x-data="{ 
            openApplyModal: false, 
            selectedJobId: '{{ $jobs->first()?->id ?? '' }}',
            jobsList: {{ Js::from($jobs) }},
            selectedJob: null,
            fileName: '',
            init() {
                if (this.jobsList.length > 0) {
                    this.selectedJob = this.jobsList[0];
                    this.selectedJobId = this.jobsList[0].id;
                }
            },
            setJob(id) {
                this.selectedJobId = id;
                this.selectedJob = this.jobsList.find(j => j.id == id) || null;
                this.openApplyModal = true;
            },
            onSelectChange(id) {
                this.selectedJob = this.jobsList.find(j => j.id == id) || null;
            }
         }" 
         x-init="init()"
         x-effect="document.body.classList.toggle('overflow-hidden', openApplyModal)"
         class="py-24 bg-white relative">
    
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Flash Alerts -->
        @if(session('success'))
            <div class="p-5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-start space-x-3 shadow-xs">
                <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div class="flex-1">
                    <p class="font-bold">Application Received Successfully!</p>
                    <p class="text-xs text-emerald-700 mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="p-5 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-sm space-y-1 shadow-xs">
                <p class="font-bold flex items-center space-x-2">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Please correct the errors below to submit your application:</span>
                </p>
                <ul class="list-disc list-inside text-xs text-red-700 pt-1 space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200 pb-6">
            <div>
                <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight">
                    Open Engineering Roles <span class="text-emerald-600 text-lg font-bold">({{ count($jobs) }})</span>
                </h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">Explore current openings and submit your application online.</p>
            </div>
            <div class="flex items-center space-x-2 text-xs text-slate-500 font-medium bg-slate-50 px-3.5 py-1.5 rounded-full border border-slate-200 self-start sm:self-auto">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Active Recruitment Cycle</span>
            </div>
        </div>

        <!-- Job Cards List -->
        <div class="space-y-6">
            @forelse($jobs as $job)
                <div class="group relative bg-white p-8 sm:p-9 rounded-3xl border border-slate-200 hover:border-emerald-400 shadow-sm hover:shadow-xl hover:shadow-emerald-500/10 transition-all duration-300 flex flex-col md:flex-row md:items-center justify-between gap-8 overflow-hidden">
                    
                    <!-- Top Accent Border on Hover -->
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                    <div class="space-y-4 flex-1">
                        <!-- Badges -->
                        <div class="flex flex-wrap items-center gap-2.5">
                            <span class="text-[11px] px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold border border-emerald-200/80 uppercase tracking-wider">
                                {{ strtoupper(str_replace('_', ' ', $job->job_type)) }}
                            </span>
                            <span class="text-[11px] px-3 py-1 rounded-full bg-slate-100 text-slate-600 font-semibold border border-slate-200">
                                {{ $job->department }}
                            </span>
                            <span class="text-[11px] px-3 py-1 rounded-full bg-cyan-50 text-cyan-700 font-semibold border border-cyan-200">
                                {{ $job->experience_level }}
                            </span>
                        </div>

                        <!-- Title & Description -->
                        <div>
                            <h3 class="font-outfit font-bold text-xl sm:text-2xl text-slate-900 group-hover:text-emerald-700 transition-colors">
                                {{ $job->title }}
                            </h3>
                            <p class="text-slate-600 text-sm leading-relaxed mt-2 line-clamp-2">
                                {{ $job->description }}
                            </p>
                        </div>

                        <!-- Metadata Badges -->
                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 font-medium pt-2 border-t border-slate-100">
                            <span class="flex items-center space-x-1.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>{{ $job->location }}</span>
                            </span>
                            @if($job->salary_range)
                                <span class="flex items-center space-x-1.5 text-emerald-700 font-semibold">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>{{ $job->salary_range }}</span>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Apply CTA Button -->
                    <div class="shrink-0">
                        <button @click="setJob({{ $job->id }})" 
                                class="w-full md:w-auto px-7 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white font-bold text-xs shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/40 hover:scale-105 transition-all flex items-center justify-center space-x-2 cursor-pointer">
                            <span>Apply & Submit Resume</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>
            @empty
                <div class="bg-slate-50 p-16 rounded-3xl text-center space-y-3 border border-slate-200">
                    <div class="w-12 h-12 rounded-2xl bg-slate-200 text-slate-500 mx-auto flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-outfit font-bold text-lg text-slate-800">No Active Roles at This Moment</h3>
                    <p class="text-slate-500 text-xs max-w-sm mx-auto">We regularly post new openings. Feel free to send your open application to <span class="font-semibold text-emerald-600">careers@adventuresoft.com</span>.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Complete Professional Job Application Modal -->
    <div x-show="openApplyModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] flex items-start sm:items-center justify-center p-4 sm:p-6 pt-24 sm:pt-28 pb-16 bg-slate-950/75 backdrop-blur-md overflow-y-auto"
         style="display: none;">
        
        <div @click.outside="openApplyModal = false"
             x-show="openApplyModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
             class="bg-white w-full max-w-2xl rounded-3xl border border-slate-200 shadow-2xl overflow-hidden my-auto text-slate-900 relative">
            
            <!-- Modal Header -->
            <div class="p-6 sm:p-8 bg-gradient-to-r from-slate-50 via-emerald-50/50 to-slate-50 border-b border-slate-200 relative">
                <button @click="openApplyModal = false" class="absolute top-5 right-5 w-9 h-9 rounded-full bg-white border border-slate-200 text-slate-400 hover:text-slate-900 hover:border-slate-300 flex items-center justify-center transition-all text-lg font-bold shadow-xs cursor-pointer">
                    &times;
                </button>
                
                <div class="space-y-2 pr-10">
                    <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 text-xs font-bold uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
                        <span>Job Application Form</span>
                    </div>
                    
                    <template x-if="selectedJob">
                        <div class="space-y-1.5">
                            <h3 class="font-outfit font-extrabold text-2xl text-slate-900 tracking-tight" x-text="selectedJob.title"></h3>
                            <div class="flex flex-wrap items-center gap-2 text-xs text-slate-600 font-medium">
                                <span class="bg-white px-2.5 py-0.5 rounded-lg border border-slate-200 text-slate-800 font-semibold" x-text="selectedJob.department"></span>
                                <span class="bg-emerald-50 px-2.5 py-0.5 rounded-lg border border-emerald-200 text-emerald-700 font-semibold" x-text="selectedJob.job_type.replace('_', ' ').toUpperCase()"></span>
                                <span class="text-slate-600 font-medium" x-text="'📍 ' + selectedJob.location"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Application Form -->
            <form action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
                @csrf

                <!-- Selected Role Highlight Card & Dropdown -->
                <div class="p-4 sm:p-5 rounded-2xl bg-gradient-to-br from-emerald-50/70 via-slate-50 to-cyan-50/50 border border-emerald-200/80 space-y-3 shadow-xs">
                    <div class="flex items-center justify-between">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-800 flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>Applying Position Details</span>
                        </span>
                        <span class="text-[10px] text-slate-500 font-medium">Switch role anytime below</span>
                    </div>

                    <!-- Visual Summary Badges Inside Form -->
                    <template x-if="selectedJob">
                        <div class="p-3 bg-white rounded-xl border border-slate-200 space-y-1.5">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <span class="font-outfit font-bold text-base text-slate-900" x-text="selectedJob.title"></span>
                                <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200" x-text="selectedJob.job_type.replace('_', ' ').toUpperCase()"></span>
                            </div>
                            <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500">
                                <span>📁 Department: <strong class="text-slate-700" x-text="selectedJob.department"></strong></span>
                                <span>📍 Location: <strong class="text-slate-700" x-text="selectedJob.location"></strong></span>
                            </div>
                        </div>
                    </template>

                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Select / Change Position <span class="text-red-500">*</span></label>
                        <select name="job_id" x-model="selectedJobId" @change="onSelectChange($event.target.value)" required class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-300 text-slate-900 text-xs font-bold focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition-all cursor-pointer">
                            @foreach($jobs as $j)
                                <option value="{{ $j->id }}">{{ $j->title }} — ({{ $j->department }} • {{ strtoupper(str_replace('_', ' ', $j->job_type)) }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- 1. Personal Information -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 border-b border-slate-100 pb-2 flex items-center space-x-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>1. Personal & Contact Details</span>
                    </h4>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="applicant_name" value="{{ old('applicant_name') }}" required placeholder="e.g. Tareq Jamil Sarkar" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-xs focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition-all">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="tareq@example.com" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-xs focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Phone / WhatsApp Number <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="+880 1700-000000" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-xs focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition-all">
                        </div>
                    </div>
                </div>

                <!-- 2. Online Profiles & Portfolio -->
                <div class="space-y-4 pt-2">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 border-b border-slate-100 pb-2 flex items-center space-x-2">
                        <span class="w-2 h-2 rounded-full bg-cyan-500"></span>
                        <span>2. Professional Profiles & Links</span>
                    </h4>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">LinkedIn Profile</label>
                            <input type="url" name="linkedin_url" value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/in/username" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-xs focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Portfolio / GitHub / Website</label>
                            <input type="url" name="portfolio_url" value="{{ old('portfolio_url') }}" placeholder="https://github.com/username" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-xs focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition-all">
                        </div>
                    </div>
                </div>

                <!-- 3. Cover Letter -->
                <div class="space-y-2 pt-2">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 flex items-center space-x-2">
                            <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                            <span>3. Cover Letter & Note to Recruiter</span>
                        </h4>
                        <span class="text-[10px] text-slate-400 uppercase font-semibold">Optional</span>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Why are you a great fit for this role?</label>
                        <textarea name="cover_letter" rows="4" placeholder="Briefly highlight your core technical strengths, relevant achievements, notice period, and why you want to join Adventure Soft..." class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-xs focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition-all leading-relaxed">{{ old('cover_letter') }}</textarea>
                    </div>
                </div>

                <!-- 4. Resume / CV Upload -->
                <div class="space-y-3 pt-2">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 border-b border-slate-100 pb-2 flex items-center space-x-2">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        <span>4. Resume / Curriculum Vitae <span class="text-red-500">*</span></span>
                    </h4>

                    <!-- Styled Upload Box -->
                    <div class="relative border-2 border-dashed border-slate-300 hover:border-emerald-500 rounded-2xl p-6 text-center bg-slate-50/60 hover:bg-emerald-50/30 transition-all cursor-pointer group">
                        <input type="file" 
                               name="resume" 
                               id="resume-file" 
                               required 
                               accept=".pdf,.doc,.docx" 
                               @change="fileName = $event.target.files[0] ? $event.target.files[0].name : ''"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        
                        <div class="space-y-2 pointer-events-none">
                            <div class="w-12 h-12 rounded-2xl bg-white border border-slate-200 text-emerald-600 mx-auto flex items-center justify-center group-hover:scale-110 group-hover:border-emerald-400 shadow-xs transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-800 group-hover:text-emerald-700">Click to upload or drag & drop your resume</span>
                                <span class="block text-[11px] text-slate-500 mt-0.5">Supported formats: PDF, DOC, DOCX (Max size: 5MB)</span>
                            </div>
                            <div x-show="fileName" class="pt-2 text-xs font-bold text-emerald-700 flex items-center justify-center space-x-1" style="display: none;">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Selected File: <span x-text="fileName" class="underline"></span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Action Buttons -->
                <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <p class="text-[11px] text-slate-500">By submitting, you agree to our recruitment terms.</p>
                    <div class="flex items-center space-x-3">
                        <button type="button" @click="openApplyModal = false" class="px-5 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-all cursor-pointer">
                            Cancel
                        </button>
                        <button type="submit" class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white font-bold text-xs shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/40 hover:scale-105 transition-all flex items-center space-x-2 cursor-pointer">
                            <span>Submit Application</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>

@endsection
