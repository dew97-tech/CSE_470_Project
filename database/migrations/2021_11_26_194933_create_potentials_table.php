<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potentials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            // $table->string('parent')->nullable();
            $table->string('parent_phone')->nullable();
            // $table->string('address')->nullable();
            $table->string('prev_institution')->nullable();
            $table->string('current_grade')->nullable();
            $table->string('exam_batch_session')->nullable();
            $table->text('subjects')->nullable();
            $table->string('source')->nullable();
            $table->string('enrolling_level')->nullable();
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
        Schema::dropIfExists('potentials');
    }
}
