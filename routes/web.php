<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Profile Section
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/password/{id}', [ProfileController::class, 'password'])->name('profile.password');
Route::delete('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

// --------------------------Admin-----------------------------
// User
Route::resource('user', UserController::class);
// Department
Route::resource('department', DepartmentController::class);
// Position
Route::resource('position', PositionController::class);
// RFID
Route::resource('tag', TagController::class);

// --------------------------Distributor-----------------------------


// --------------------------User-----------------------------
Route::resource('document', DocumentController::class);
Route::get('/document/my-document', [DocumentController::class, 'my_document'])->name('document.my');
Route::get('/document/waiting-review', [DocumentController::class, 'waiting_review'])->name('document.waiting');
Route::get('/document/{id}/history', [DocumentController::class, 'history'])->name('document.history');
