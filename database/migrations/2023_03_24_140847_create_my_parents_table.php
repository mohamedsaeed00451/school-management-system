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
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Father info
            $table->string('Name_Father');
            $table->string('National_ID_Father');
            $table->string('Passport_ID_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            $table->string('Address_Father');

            //Mother info
            $table->string('Name_Mother');
            $table->string('National_ID_Mother');
            $table->string('Passport_ID_Mother');
            $table->string('Phone_Mother');
            $table->string('Job_Mother');
            $table->string('Address_Mother');

            //foreignKey
            $table->foreignId('Nationality_Father_ID')->constrained('id')->on('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Blood_Type_Father_ID')->constrained('id')->on('blood_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Religion_Father_ID')->constrained('id')->on('religions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Nationality_Mother_ID')->constrained('id')->on('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Blood_Type_Mother_ID')->constrained('id')->on('blood_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Religion_Mother_ID')->constrained('id')->on('religions')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('my_parents');
    }
};
