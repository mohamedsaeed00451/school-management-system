<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    public $timestamps = true;
    public $translatable = ['Name_Section'];
    protected $fillable = ['Name_Section', 'Grade_id', 'Class_id', 'Status'];
    public function My_classs()
    {
        return $this->belongsTo(Classroom::class, 'Class_id');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teachers_section');
    }
    public function grades()
    {
        return $this->belongsTo(Grade::class,'Grade_id');
    }
}