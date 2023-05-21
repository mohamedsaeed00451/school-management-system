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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->decimal('Amount');
            $table->string('Year');
            $table->foreignId('Grade_id')->constrained('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Classroom_id')->constrained('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('Notes')->nullable();
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
        Schema::dropIfExists('fees');
    }
};
