<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDueDateAndPriorityToTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('due_date')->nullable(); // Add due_date column
            $table->string('priority')->default('normal'); // Add priority column
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['due_date', 'priority']); // Remove the columns if rolled back
        });
    }
}

