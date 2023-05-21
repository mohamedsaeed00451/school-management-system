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
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Quizze_id')->constrained('id')->on('quizzes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Student_id')->constrained('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Question_id')->constrained('id')->on('questions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('Score');
            $table->boolean('Abuse')->default(0);
            $table->date('Date');
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
        Schema::dropIfExists('degrees');
    }
};
