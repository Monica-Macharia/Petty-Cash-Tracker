<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pettycash extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'payment_details',
        'service',
        'cash_payable',
        'status'
    ];
}
