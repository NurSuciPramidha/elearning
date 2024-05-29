<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Testing\Constraints\CountInDatabase;
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
Route::get('/hello', function() {
    return "Hello World";
});

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

// route untuk menampilkan halaman student
Route::get('/admin/student', [StudentController::class, 'index']);

// route untuk menampilkan halaman course
Route::get('/admin/courses', [CoursesController::class, 'index']);