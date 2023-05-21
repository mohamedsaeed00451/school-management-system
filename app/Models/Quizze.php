<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['Name'];
    protected $fillable = ['Name', 'Grade_id', 'Classroom_id', 'Teacher_id','Section_id','Subject_id'];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'Section_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'Teacher_id');
    }
    public  function question()
    {
        return $this->hasMany(Question::class,'Quizze_id');
    }

    public function degree()
    {
        return $this->hasMany(Degree::class, 'Quizze_id');
    }
}
