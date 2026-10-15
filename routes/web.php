<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\Admin\TeamAdminController;
use App\Http\Controllers\Admin\JobAdminController;
use App\Http\Controllers\Admin\InquiryAdminController;
use App\Http\Controllers\Admin\SettingAdminController;
use App\Http\Middleware\AdminAuthMiddleware;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\InquiryController;
use App\Http\Controllers\Frontend\JobApplicationController;
use App\Http\Controllers\MediaController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'serviceShow'])->name('services.show');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [PageController::class, 'projectShow'])->name('projects.show');
Route::get('/portfolio', function() { return redirect()->route('projects'); })->name('portfolio');
Route::get('/technologies', [PageController::class, 'technologies'])->name('technologies');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Public Form Submissions
Route::post('/inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');
Route::post('/careers/apply', [JobApplicationController::class, 'store'])->name('careers.apply');

// Uploaded media (stored outside /public in storage/app/uploads)
Route::get('/media/{folder}/{filename}', [MediaController::class, 'show'])
    ->where(['folder' => '[a-z0-9_-]+', 'filename' => '[A-Za-z0-9._-]+'])
    ->name('media.show');

/*
|--------------------------------------------------------------------------
| Admin Portal Routes (/admin)
| NOTE: NO Admin login link in public Navbar as per security mandate!
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Login Routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Dashboard Routes
    Route::middleware([AdminAuthMiddleware::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Services CRUD
        Route::resource('services', ServiceAdminController::class);

        // Projects Management CRUD
        Route::resource('projects', ProjectAdminController::class);

        // Engineering Leaders / Team Management CRUD
        Route::resource('teams', TeamAdminController::class);

        // Careers & Job Openings Management CRUD
        Route::resource('jobs', JobAdminController::class);
        Route::get('/jobs/{job}/applications', [JobAdminController::class, 'applications'])->name('jobs.applications');
        Route::patch('/applications/{application}/status', [JobAdminController::class, 'updateApplicationStatus'])->name('applications.status');
        Route::delete('/applications/{application}', [JobAdminController::class, 'destroyApplication'])->name('applications.destroy');

        // Inquiries Management
        Route::get('/inquiries', [InquiryAdminController::class, 'index'])->name('inquiries.index');
        Route::get('/inquiries/{inquiry}', [InquiryAdminController::class, 'show'])->name('inquiries.show');
        Route::patch('/inquiries/{inquiry}/status', [InquiryAdminController::class, 'updateStatus'])->name('inquiries.status');
        Route::delete('/inquiries/{inquiry}', [InquiryAdminController::class, 'destroy'])->name('inquiries.destroy');

        // Global Site Settings
        Route::get('/settings', [SettingAdminController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingAdminController::class, 'update'])->name('settings.update');
    });
});
