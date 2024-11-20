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
Route::get('/candidate-ac-details', [App\Http\Controllers\candidate_controller::Class,'showACDetails'])->middleware('auth')->name('candidate.ac.details');

//Educational details 
Route::get('get_eduDetails_ajax',[App\Http\Controllers\educational_details_controllers::Class,'get_eduDetails_ajax'])->name('get_eduDetails_ajax.get');
Route::delete('delete_edu_detail',[App\Http\Controllers\educational_details_controllers::Class,'delete_edu_detail'])->name('delete_edu_detail.delete');
Route::post('save_edu_details', [App\Http\Controllers\educational_details_controllers::Class, 'save_edu_details'])->name('save_edu_details.post');







require __DIR__.'/auth.php';
