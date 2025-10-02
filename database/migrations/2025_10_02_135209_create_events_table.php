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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Titre de l'événement
            $table->text('description')->nullable();
            $table->date('start_date'); // Date de début
            $table->date('end_date')->nullable(); // Date de fin
            $table->time('start_time')->nullable(); // Heure de début
            $table->time('end_time')->nullable(); // Heure de fin
            $table->string('location')->nullable(); // Lieu
            $table->enum('type', ['meeting', 'exam', 'holiday', 'activity', 'other'])->default('other');
            $table->enum('visibility', ['public', 'private', 'class_specific'])->default('public');
            $table->json('target_audience')->nullable(); // Classes ou utilisateurs ciblés
            $table->boolean('is_all_day')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
