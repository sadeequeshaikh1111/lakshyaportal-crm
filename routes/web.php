<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\candidate_controller;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/candidate_details', function () {
    return view('candidate_details');
})->name('candidate_details');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Account management route
Route::get('Fetch_candidates',[App\Http\Controllers\candidate_controller::Class,'Fetch_candidates'])->name('Fetch_candidates.get');
Route::get('Fetch_candidate_AC_details',[App\Http\Controllers\candidate_controller::Class,'Fetch_candidate_AC_details'])->name('Fetch_candidate_AC_details.get');







require __DIR__.'/auth.php';
