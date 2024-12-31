<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Timer;

Route::get('/', Timer::class)->name('timer');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
