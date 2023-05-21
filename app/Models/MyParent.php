<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;

class MyParent extends Authenticatable
{
    use HasFactory,Notifiable,HasTranslations;

    public $timestamps = true;
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];
    protected $guarded = [];
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
