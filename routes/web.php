<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::prefix('/instructor')->middleware(['auth', 'role:instructor'])->group(function () {
    Route::get('/dashboard', function () {
        return view('instructor.dashboard');
    })->name('instructor.dashboard');
    Route::resource('/schedule', ScheduleClassController::class)->only(['index', 'create', 'store', 'destroy']);
});

Route::prefix('/member')->middleware(['auth', 'role:member'])->group(function () {
    Route::get('/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard');
    Route::get('/book', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
