<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_structures', function (Blueprint $table) {
            $table->id();
            $table->string('exam_key'); 
            $table->integer('subject_id'); 
            $table->integer('chapter_number');
            $table->integer('number_of_questions');
            $table->string('difficulty');
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
        Schema::dropIfExists('exam_structures');
    }
};
