<?php

use App\Livewire\Inquilino;
use App\Livewire\Propieds;
use App\Models\Propiedad;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::get('/propiedades',Propieds::class)->name('propiedades')->middleware('auth');
Route::get('/inquilinos',Inquilino::class)->name('inquilinos');

require __DIR__.'/auth.php';
