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
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Student_id')->constrained('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Grade_id')->constrained('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Classroom_id')->constrained('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Fee_id')->constrained('id')->on('fees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('Amount');
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
        Schema::dropIfExists('fee_invoices');
    }
};
