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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Titre du cours
            $table->text('description')->nullable();
            $table->text('content')->nullable(); // Contenu du cours
            $table->date('start_date'); // Date de début
            $table->date('end_date')->nullable(); // Date de fin
            $table->time('start_time'); // Heure de début
            $table->time('end_time'); // Heure de fin
            $table->string('day_of_week'); // Jour de la semaine (lundi, mardi, etc.)
            $table->string('room')->nullable(); // Salle
            $table->enum('status', ['scheduled', 'ongoing', 'completed', 'cancelled'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
