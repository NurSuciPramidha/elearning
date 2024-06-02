<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //menampilkan data Courses dari database
    public function index(){
        // mendapatkan data dari table courses
        $courses = Courses::all();

        // kirim data ke view untuk menampilkan
        return view('admin.contents.courses.index', [
            'courses' => $courses
        ]);
    }
}
