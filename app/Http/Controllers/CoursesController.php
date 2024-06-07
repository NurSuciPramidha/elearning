<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use GuzzleHttp\Psr7\Message;
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

    // method untuk menampilkan form tambah courses
    public function create(){
        return view('admin.contents.courses.create');
    }

    // method untuk menyimpan data course baru
    public function store(Request $request){
        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan ke database
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembali ke halaman course
        return redirect('/admin/courses')->with('message', 'Course Berhasil Ditambahkan');
    }

    // method untuk menampilakn halaman edit
    public function edit($id){
        // cari data course berdasarkan id
        $course = Courses::find($id);

        return view('admin.contents.courses.edit',[
            'course' => $course
        ]);

    }

    // method untuk menyimpan hasil update 
    public function update($id, Request $request){
        // cari course berdasarkan id
        $course = Courses::find($id);

         // validasi request
         $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan perubahan
        $course->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembali ke halaman course
        return redirect('/admin/courses')->with('message', 'Course Berhasil Diedit');
    }

    // method untuk menghapus course
    public function destroy($id){
        // cari course berdasarkan id
        $course = Courses::find($id);

        // hapus course
        $course->delete();

        // kembali ke halaman course
        return redirect('admin/courses')->with('message', 'Course Berhasil Dihapus');
    }
}
