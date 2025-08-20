<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\BoookingController; // koreksi typo di BookingController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    // Halaman Dashboard
    Route::get('/dashboard', function () {
        $user = Auth::user();
        return match ($user->role) {
            'admin' => redirect()->route('dashboard.admin'),
            default => redirect()->route('dashboard.user'),
        };
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->middleware(CheckRole::class . ':admin')
        ->name('dashboard.admin');
    Route::get('/dashboard/user', [DashboardController::class, 'user'])
        ->middleware(CheckRole::class . ':user')
        ->name('dashboard.user');

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::prefix('admin')->middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    Route::resource('buses', BusController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('bookings', BoookingController::class)->only(['index', 'show', 'destroy']);
});


require __DIR__ . '/auth.php';
