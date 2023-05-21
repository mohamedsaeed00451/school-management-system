<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
    use HasFactory;
    protected $fillable = ['File_Name','Parent_id'];
    public $timestamps = true;
}
