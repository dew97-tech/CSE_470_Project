<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    protected $primaryKey = "id";

    protected $fillable = [
        'student_id',
        'status',
        'location',
        'name',
        'dob',
        'gender',
        'blood_group',
        'phone',
        'email',
        'address',
        'father_name',
        'father_no',
        'mother_name',
        'mother_no',
        'parent_office_address',
        'parent',
        'parent_phone',
        'subjects',
        'prev_institution',
        'current_grade',
        'preferred_syllabus',
        'enrolling_level',
        'source',
        'photo',
        'student_sign',
        'parent_sign',
        'counsellor_sign',
        'authority_sign'
    ];
}
