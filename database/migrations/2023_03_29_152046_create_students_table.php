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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('Name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('Birth_date');
            $table->string('Academic_year');
            $table->foreignId('Gender_id')->constrained('id')->on('genders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Nationalitie_id')->constrained('id')->on('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Blood_id')->constrained('id')->on('blood_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Grade_id')->constrained('id')->on('Grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Classroom_id')->constrained('id')->on('Classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Section_id')->constrained('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Parent_id')->constrained('id')->on('my_parents')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
};
