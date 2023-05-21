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
        Schema::create('student_account_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Student_id')->constrained('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Fee_invoice_id')->nullable()->constrained('id')->on('fee_invoices')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Receipt_id')->nullable()->constrained('id')->on('receipt_expenses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Processing_id')->nullable()->constrained('id')->on('processing_fees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Payment_id')->nullable()->constrained('id')->on('payment_expenses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('Debit')->nullable();
            $table->decimal('Credit')->nullable();
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
        Schema::dropIfExists('student_account_expenses');
    }
};
