<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklist_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('task_id')->nullable()->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->unsignedInteger('position');
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('added_to_my_day_at')->nullable();
            $table->boolean('is_important')->default(false);
            $table->date('due_date')->nullable();
            $table->timestamp('reminder_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
