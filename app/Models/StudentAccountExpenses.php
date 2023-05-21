<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccountExpenses extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['Student_id', 'Fee_invoice_id','Receipt_id','Processing_id','Payment_id', 'Debit', 'Credit'];
}
