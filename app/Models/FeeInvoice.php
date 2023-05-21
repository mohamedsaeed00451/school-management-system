<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['Student_id', 'Fee_id', 'Amount', 'Classroom_id', 'Grade_id', 'Notes'];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'Student_id');
    }
    public function fees()
    {
        return $this->belongsTo(Fee::class, 'Fee_id');
    }
}
