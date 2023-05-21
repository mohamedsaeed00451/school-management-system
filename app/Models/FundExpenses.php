<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundExpenses extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['Receipt_id', 'Payment_id', 'Debit', 'Credit'];
}
