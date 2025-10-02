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
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->text('content')->nullable(); // Contenu de la soumission
            $table->json('attachments')->nullable(); // Fichiers joints
            $table->timestamp('submitted_at'); // Date et heure de soumission
            $table->enum('status', ['draft', 'submitted', 'late', 'graded'])->default('draft');
            $table->text('teacher_feedback')->nullable(); // Commentaires du professeur
            $table->timestamps();
            
            // Contrainte unique pour éviter les doublons
            $table->unique(['assignment_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};
