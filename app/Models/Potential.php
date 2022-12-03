<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potential extends Model
{
    protected $table = "potentials";

    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'phone',
        // 'parent',
        'parent_phone',
        'source',
        'prev_institution',
        'current_grade',
        'exam_batch_session',
        // 'address',
        'subjects',
        'enrolling_level'
    ];
}
