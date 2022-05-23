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
        // Schema::create('exams', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('exam_key');
        //     $table->string('exam_name');
        //     $table->double('duration', 8, 2);
        //     $table->dateTime('start_from');
        //     $table->boolean('is_accessed_anytime')->default(0);
        //     $table->boolean('is_accepting_responses')->default(0);
        //     $table->boolean('is_dynamic')->default(0);
        //     $table->integer('professor_id');   
        //     $table->integer('subject_id');
        //     $table->integer('department_id');
        //     $table->integer('level_id');
        //     $table->integer('total_questions')->nullable();
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
