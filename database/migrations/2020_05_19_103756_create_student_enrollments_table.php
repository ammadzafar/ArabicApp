<?php

use App\Util\Constants\AppConstants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enrollments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->integer('alphabet_id');
            $table->integer('chapter_id');
            $table->string('student_voice');
            $table->enum('status',array_values(AppConstants::$status))->default('Recorded');
            $table->string('rating')->nullable();
            $table->string('duration')->default(0);
            $table->longText('comment')->nullable();
            $table->boolean('is_rated')->default(0);
            $table->integer('rated_by')->nullable();
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
        Schema::dropIfExists('student_enrollments');
    }
}
