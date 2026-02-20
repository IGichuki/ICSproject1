// Admin dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
// Employer company profile management
Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('company-profile/edit', [App\Http\Controllers\CompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::post('company-profile/update', [App\Http\Controllers\CompanyProfileController::class, 'update'])->name('company-profile.update');
});
// Employer application management
Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('employer/applications', [ApplicationController::class, 'employerIndex'])->name('employer.applications');
    Route::post('application/{id}/status', [ApplicationController::class, 'updateStatus'])->name('application.updateStatus');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobpostingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});
Route::get('application', function () {
    return view('application');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('joblisting', [jobpostingController::class, 'index']);
Route::get('jobposting', [jobpostingController::class, 'create']);
Route::post('jobposting', [jobpostingController::class, 'store']);
Route::get('jobposting/{id}/edit', [jobpostingController::class, 'edit']);
use App\Http\Controllers\ApplicationController;
Route::get('joblisting/{id}/apply', [ApplicationController::class, 'create'])->name('application.create');
Route::post('joblisting/{id}/apply', [ApplicationController::class, 'store'])->name('application.store');
Route::get('joblisting/{id}/delete', [jobpostingController::class, 'delete']);



