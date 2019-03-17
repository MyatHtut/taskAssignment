<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer("task_type_id")->references("id")->on("task_types");
            $table->string('company');
            $table->integer("user_id")->references("id")->on("users");
            $table->string('subject');
            $table->integer("assigned_id")->references("id")->on("users");
            $table->integer("created_user_id")->references("id")->on("users");
            $table->integer("priority_id")->references("id")->on("priorities");
            $table->dateTime("due_date");
            $table->dateTime("set_reminder")->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
