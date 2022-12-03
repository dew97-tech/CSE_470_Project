<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = "batches";

    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'status',
        'subject',
        'teacher',
        'start_date',
        'timestamp',
        'fee',
        'room',
        'days',
        'classtime'
    ];

    public function batchSubject() 
    {
        return $this->hasOne(Subject::class, 'id', 'subject');
    }

    public function batchTeacher() 
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher');
    }
}
