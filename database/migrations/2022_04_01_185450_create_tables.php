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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email')->unique();
            $table->string('password', 500);
            $table->integer('level_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->boolean('verified')->default(false);
            $table->integer('role')->default(3); 
            $table->timestamps();

        });
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name', 100);
        });

        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_key');
            $table->string('exam_name');
            $table->double('duration', 8, 2);
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('professor_id');   
            $table->integer('subject_id');
            $table->integer('department_id');
            $table->integer('level_id');
            $table->integer('total_questions')->nullable();
            $table->timestamps();
        });

        Schema::create('test_papers', function (Blueprint $table) {
            $table->id();
            $table->string('exam_key');
            $table->integer('question_id');
            $table->integer('question_type_id')->nullable();
            $table->timestamps();
        });

        Schema::create('question_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->timestamps();
        });

        Schema::create('single_choice_questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('depart_id');
            $table->integer('level_id');
            $table->integer('subject_id');
            $table->integer('chapter_number');
            $table->integer('question_type');
            $table->string('difficulty');
            $table->string('option_one');
            $table->string('option_two');
            $table->string('option_three');
            $table->string('option_four');
            $table->string('answer');
            $table->double('marks');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('dep_name');
            $table->string('dep_description');
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name');
            $table->string('subject_description');
            $table->integer('chapter_count');
            $table->timestamps();
        });

        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->integer('level_number');
            $table->timestamps();
        });

        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->string('exam_key');
            $table->integer('enrolled');
            $table->integer('passed');
            $table->integer('failed');
        });

        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string('exam_key');
            $table->integer('student_id');
            $table->integer('score');
            $table->timestamps();
        });

        Schema::create('proffesor_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('professor_id');
            $table->integer('subject_id');
        });







    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
};
