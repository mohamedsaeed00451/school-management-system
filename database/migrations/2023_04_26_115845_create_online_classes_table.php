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
        Schema::create('online_classes', function (Blueprint $table) {
            $table->id();
            $table->boolean('Integration');
            $table->foreignId('Grade_id')->constrained('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Classroom_id')->constrained('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Section_id')->constrained('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('User_id')->nullable()->constrained('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Teacher_id')->nullable()->constrained('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Meeting_id');
            $table->string('Topic');
            $table->dateTime('Start_at');
            $table->integer('Duration')->comment('minutes');
            $table->string('Password')->comment('meeting password');
            $table->text('Start_url');
            $table->text('Join_url');
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
        Schema::dropIfExists('online_classes');
    }
};
