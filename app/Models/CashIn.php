<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashIn extends Model
{
    protected $table = "cash_ins";

    protected $primaryKey = "id";

    protected $fillable = [
        'student',
        'receipt_no',
        'month',
        'paid_batches',
        'mobile',
        'collected_by',
        'total_fee'
    ];

    public function cashinStudent()
    {
        return $this->hasOne(Student::class, 'id', 'student');
    }
}
