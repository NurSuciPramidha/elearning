<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

Route::get('/', function () {
    return view('welcome');
});

/**
 * HTTP Metthod:
 * 1. GET : Untuk menampilkan
 * 2. POST : Untuk mengirim data
 * 3. PUT : Untuk mengupdate data
 * 4. DELETE : Unutk menghapus data 
 */ 

// route untuk menampilkan teks salam
Route::get('/salam', function() {
    return "Assalamualaikum...";
});

Route::get('/profile', function() {
    return view('profile');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);