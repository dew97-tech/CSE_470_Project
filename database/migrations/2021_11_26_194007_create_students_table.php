<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('location')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_no')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_no')->nullable();
            $table->string('parent_office_address')->nullable();
            $table->string('parent')->nullable();
            $table->string('parent_phone')->nullable();
            $table->text('subjects')->nullable();
            $table->string('prev_institution')->nullable();
            $table->string('current_grade')->nullable();
            $table->string('preferred_syllabus')->nullable();
            $table->string('enrolling_level')->nullable();
            $table->string('source')->nullable();
            $table->string('photo')->nullable();
            $table->string('student_sign')->nullable();
            $table->string('parent_sign')->nullable();
            $table->string('counsellor_sign')->nullable();
            $table->string('authority_sign')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
