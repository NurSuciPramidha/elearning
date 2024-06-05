<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // mendefinisikan kolom, yang boleh diisi/dimodifikasi
    protected $fillable = ['name', 'nim', 'major', 'class', 'courses_id'];

    /**
     * Laravel Relationship method:
     * 1. One to One 
     *  - hasOne()          = tabel saat ini meminjamkan id/key ke tabel lain  
     *  - belongTo()        = tabel saat ini meminjam id/key dari tabel lain
     * 2. One to many / Many to Many
     *  - hasMany()          = tabel saat ini meminjamkan id/key ke tabel lain
     *  - belongstoMany()   = tabel saat ini meminjam id/key dari tabel lain
     */

    // mendefinisikan relasi ke model course 
    public function course(){
        return $this->belongsTo(Courses::class, 'courses_id');
    }
}
