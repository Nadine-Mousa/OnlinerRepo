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
        // Schema::create('questions', function (Blueprint $table) {
        //     $table->id();
        //     $table->softDeletes();
        //     $table->integer('subject_id');
        //     $table->string('title');
        //     $table->integer('difficulty');
        //     $table->integer('question_type');
        //     $table->double('marks')->default(0);
        //     $table->integer('chapter_number');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
