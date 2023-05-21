<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory;
    use HasTranslations;
    public $timestamps = true;
    public $translatable = ['Title'];
    protected $fillable = ['Title', 'Amount', 'Classroom_id', 'Grade_id', 'Year', 'Notes'];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
}
