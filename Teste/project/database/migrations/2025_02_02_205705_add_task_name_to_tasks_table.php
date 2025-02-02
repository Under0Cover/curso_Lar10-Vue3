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
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('taskName')->nullable(false);

            $table->timestamp('created_at')->useCurrent()->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        SSchema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('taskName');
    
            $table->timestamp('created_at')->nullable()->change();
        });
    }
};
