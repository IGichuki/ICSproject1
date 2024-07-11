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
Route::get('joblisting/{id}/apply', [jobpostingController::class, 'apply']);
Route::get('joblisting/{id}/delete', [jobpostingController::class, 'delete']);



