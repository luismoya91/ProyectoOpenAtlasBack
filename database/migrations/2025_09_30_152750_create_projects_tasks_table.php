<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects_tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->foreign('project_id')
              ->references('id')
              ->on('projects')->onDelete('cascade');
            $table->bigInteger('task_id');
            $table->foreign('task_id')
              ->references('id')
              ->on('tasks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_tasks');
    }
};
