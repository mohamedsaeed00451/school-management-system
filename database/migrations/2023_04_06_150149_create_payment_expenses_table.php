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
        Schema::create('payment_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Student_id')->constrained('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('Amount')->nullable();
            $table->text('Notes');
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
        Schema::dropIfExists('payment_expenses');
    }
};
