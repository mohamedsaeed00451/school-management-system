<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    use HasFactory;
    public $fillable = ['Integration', 'Grade_id', 'Classroom_id', 'Section_id', 'User_id','Teacher_id', 'Meeting_id', 'Topic', 'Start_at', 'Duration', 'Password', 'Start_url', 'Join_url'];

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
    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'Teacher_id');
    }

}
