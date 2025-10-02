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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('assignment_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->decimal('points', 5, 2); // Points obtenus
            $table->decimal('max_points', 5, 2); // Points maximum
            $table->decimal('percentage', 5, 2)->nullable(); // Pourcentage
            $table->string('letter_grade')->nullable(); // Note en lettre (A, B, C, etc.)
            $table->text('comments')->nullable(); // Commentaires du professeur
            $table->date('graded_date'); // Date de notation
            $table->enum('status', ['graded', 'pending', 'excused'])->default('graded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
