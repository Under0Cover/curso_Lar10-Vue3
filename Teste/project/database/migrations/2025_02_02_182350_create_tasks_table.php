<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('taskId');
            $table->unsignedBigInteger('userID');
            $table->text('taskDescription');
            $table->enum('taskStatus', ['P', 'C']);
            $table->enum('taskActive', ['S', 'N']);
            $table->timestamps();
    
            $table->foreign('userID')->references('ID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
