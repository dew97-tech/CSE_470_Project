<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('batches', function (Blueprint $table) {
            $table->integer('status')->nullable()->after('id')->default(1);
            $table->string('title')->after('status');
            $table->date('start_date')->after('teacher');
            $table->integer('subject')->after('status')->change();
            $table->integer('teacher')->after('subject')->change();
            $table->time('timestamp')->nullable()->after('start_date');
            $table->string('fee')->after('timestamp')->default(0.00);
            $table->string('room')->after('fee')->nullable();

            $table->dropColumn('days');
            $table->dropColumn('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('batches', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('title');
            $table->dropColumn('start_date');
            $table->dropColumn('fee');
            $table->dropColumn('timestamp');
            $table->string('subject')->change();
            $table->string('teacher')->change();
        });
    }
}
