<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlphabetsRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alphabets_rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alphabet_id');
            $table->unsignedBigInteger('rule_id');
            $table->timestamps();


            $table->foreign('alphabet_id')
                ->references('id')
                ->on('alphabets')->onDelete('cascade');
            $table->foreign('rule_id')
                ->references('id')
                ->on('rules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alphabets_rules');
    }
}
