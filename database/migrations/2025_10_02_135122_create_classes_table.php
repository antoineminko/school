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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Ex: "6ème A", "Terminale S"
            $table->string('level'); // Ex: "6ème", "Terminale"
            $table->string('section')->nullable(); // Ex: "A", "B", "S", "ES"
            $table->integer('capacity')->default(30); // Capacité maximale
            $table->string('room')->nullable(); // Salle de classe
            $table->foreignId('teacher_id')->nullable()->constrained('users')->onDelete('set null'); // Professeur principal
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
