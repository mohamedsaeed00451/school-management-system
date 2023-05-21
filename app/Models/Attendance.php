<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['Student_id', 'Grade_id', 'Classroom_id', 'Section_id', 'Teacher_id', 'Attendance_date', 'Attendance_status'];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'Section_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'Student_id');
    }
}