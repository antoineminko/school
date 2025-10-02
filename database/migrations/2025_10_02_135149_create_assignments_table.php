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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Titre du devoir
            $table->text('description'); // Description du devoir
            $table->text('instructions')->nullable(); // Instructions détaillées
            $table->date('assigned_date'); // Date d'attribution
            $table->date('due_date'); // Date limite de rendu
            $table->time('due_time')->nullable(); // Heure limite
            $table->integer('max_points')->default(20); // Points maximum
            $table->enum('type', ['homework', 'project', 'exam', 'quiz'])->default('homework');
            $table->json('attachments')->nullable(); // Fichiers joints
            $table->boolean('is_published')->default(false); // Publié ou non
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
