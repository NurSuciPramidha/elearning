<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        // tarik data student dari db 
        $students = Student::all();
        
        // panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }

    // method untuk menampilkan halaman form tambah student
    public function create(){
        return view('admin.contents.student.create');
    }

    // method untuk menyimpan data student
    public function store(Request $request)
    {
        // validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

    // simpan data ke database
    Student::create([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,

    ]);

    // return ke halaman student
    return redirect('admin/student')->with('message', 'Data student berhasil ditambahkan');

    }

    // method untuk menampilkan halaman edit
    public function edit($id){
        // cari data student berdasarkan id
        $student = Student::find($id);  // find menyingkat perinth Select * FROM students WHERE id = $id;

        return view('admin.contents.student.edit',[
            'student' => $student
        ]);
    }

    // method untuk menyimpan hasil update
    public function update($id, Request $request){
        // cari data student berdasarkan id
        $student = Student::find($id);

        // validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        // simpan perubahan
        $student->update([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,
        ]);

        // kembali ke halaman student
        return redirect('admin/student')->with('message', 'Data student berhasil diedit');
    }
    // method untuk menghapus data student
    public function destroy($id){
        // cari data student berdasarkan id
        $student = Student::find($id);

        // hapus student
        $student->delete();

        // kembali ke halaman student
        return redirect('admin/student')->with('message', 'Data student berhasil dihapus');
    }
}
