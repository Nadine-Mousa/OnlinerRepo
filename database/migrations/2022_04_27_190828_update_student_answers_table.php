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
        Schema::table('student_answers', function (Blueprint $table)
        {
            $table->dropColumn('question_id');
            $table->dropColumn('student_answer');
            $table->dropColumn('correct_answer');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('score');

        });
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
