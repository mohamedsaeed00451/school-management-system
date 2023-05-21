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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Student_id')->constrained('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('From_grade')->constrained('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('From_classroom')->constrained('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('From_section')->constrained('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('To_grade')->constrained('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('To_classroom')->constrained('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('To_section')->constrained('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Academic_year');
            $table->string('Academic_year_new');
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
        Schema::dropIfExists('promotions');
    }
};
