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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('File_name');
            $table->foreignId('Grade_id')->constrained('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Classroom_id')->constrained('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Section_id')->constrained('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Teacher_id')->nullable()->constrained('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('User_id')->nullable()->constrained('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('libraries');
    }
};
