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
        Schema::dropIfExists('proffesor_subjects');
        Schema::dropIfExists('professor_subjects');
        
        Schema::create('professor_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('professor_id');
            $table->integer('subject_id');
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
        Schema::dropIfExists('professor_subjects');
    }
};
