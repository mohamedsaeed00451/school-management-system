<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    protected $fillable = ['Quizze_id','Student_id','Question_id','Score','Abuse','Date'];

    public function quizze()
    {
        return $this->belongsTo(Quizze::class,'Quizze_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'Student_id');
    }
}
