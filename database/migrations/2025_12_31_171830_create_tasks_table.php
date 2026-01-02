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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // Basic Info
            $table->string('title');
            $table->text('description')->nullable();

            // Kanban Logic
            // $table->string('status')->default('todo'); // Stores: 'todo', 'doing', 'done'
            $table->integer('sort_order')->default(0); // Stores the order (1, 2, 3...)

            // Metadata
            $table->string('priority')->default('medium'); // low, medium, high
            $table->date('due_date')->nullable();

            // Relationships
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('assigned_to')->nullable()->constrained('users'); // Who is doing it?
            $table->timestamps();
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
