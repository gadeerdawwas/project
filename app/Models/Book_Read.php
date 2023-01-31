<?php

namespace App\Models;

use App\Models\Books;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book_Read extends Model
{
    use HasFactory;
    // protected $table = 'book__reads';
    protected $guarded=[];

    public function Student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function Books()
    {
        return $this->belongsTo(Books::class,'book_id');
    }
}
