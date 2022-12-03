<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashOut extends Model
{
    //
    protected $table = "cash_outs";

    protected $primaryKey = "id";
    
    protected $fillable = [
        'receipt_no',
        'name_of_payee',
        'purpose',
        'description',
        'amount'
    ];
}
