<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'Student_id');
    }

    public function f_grade()
    {
        return $this->belongsTo(Grade::class, 'From_grade');
    }

    public function f_classroom()
    {
        return $this->belongsTo(Classroom::class, 'From_classroom');
    }

    public function f_section()
    {
        return $this->belongsTo(Section::class, 'From_section');
    }

    public function t_grade()
    {
        return $this->belongsTo(Grade::class, 'To_grade');
    }

    public function t_classroom()
    {
        return $this->belongsTo(Classroom::class, 'To_classroom');
    }

    public function t_section()
    {
        return $this->belongsTo(Section::class, 'To_section');
    }
}
