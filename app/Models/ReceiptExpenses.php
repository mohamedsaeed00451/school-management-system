<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptExpenses extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['Student_id', 'Amount', 'Notes'];
    public function student()
    {
        return $this->belongsTo(Student::class, 'Student_id');
    }
}
