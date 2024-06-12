<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
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

// route untuk menampilkan halaman form tambah student
Route::get('/admin/student/create', [StudentController::class, 'create']);

// route untuk mengirim data student
Route::post('/admin/student/store', [StudentController::class, 'store']);

// route untuk menampilkan halaman form edit student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

// route untuk menyimpan hasil student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

// route untuk menghapus data student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

// route untuk menampilkan halaman form tambah course
Route::get('admin/courses/create', [CoursesController::class, 'create']);

//  route untuk mengirim data courses terbaru
Route::post('admin/courses/store', [CoursesController::class, 'store']);

// route untuk menampilkan halaman edit course
Route::get('admin/courses/edit/{$id}', [CoursesController::class, 'edit']);

// route untuk menyimpan hasil update course
Route::put('admin/courses/update/{$id}', [CoursesController::class, 'update']);

// route untuk menghapus course
Route::delete('admin/courses/delete/{$id}', [CoursesController::class, 'destroy']);