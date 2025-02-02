<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'taskName', 
        'taskDescription', 
        'taskStatus', 
        'taskActive',
        'userID',
    ];

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('taskId');
            $table->unsignedBigInteger('user_id');
            $table->text('taskDescription');
            $table->enum('taskStatus', ['P', 'C']);
            $table->enum('taskActive', ['S', 'N']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
