<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;

class Teacher extends Authenticatable
{
    use HasFactory,Notifiable,HasTranslations;

    public $timestamps = true;
    public $translatable = ['Name'];
    protected $guarded = [];

    public function genders()
    {
        return $this->belongsTo(Gender::class, 'Gender_id');
    }
    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'Specialization_id');
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class,'teachers_section');
    }
}
