<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, HasTranslations, SoftDeletes;

    public $timestamps = true;
    public $translatable = ['Name'];
    protected $guarded = [];

	public function gender()
    {
        return $this->belongsTo(Gender::class, 'Gender_id');
    }
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
    public function nationality()
    {
        return $this->belongsTo(Nationalitie::class, 'Nationalitie_id');
    }
    public function parent()
    {
        return $this->belongsTo(MyParent::class, 'Parent_id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function student_account_expenses()
    {
        return $this->hasMany(StudentAccountExpenses::class, 'Student_id');
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'Student_id');
    }
}
