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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable(); // Prénom
            $table->string('last_name')->nullable(); // Nom de famille
            $table->string('phone')->nullable(); // Téléphone
            $table->date('date_of_birth')->nullable(); // Date de naissance
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Genre
            $table->text('address')->nullable(); // Adresse
            $table->string('avatar')->nullable(); // Photo de profil
            $table->foreignId('school_id')->nullable()->constrained()->onDelete('set null'); // École
            $table->foreignId('class_id')->nullable()->constrained()->onDelete('set null'); // Classe (pour les élèves)
            $table->string('student_number')->nullable()->unique(); // Numéro d'étudiant
            $table->string('parent_email')->nullable(); // Email du parent (pour les élèves)
            $table->string('parent_phone')->nullable(); // Téléphone du parent
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->timestamp('last_login_at')->nullable(); // Dernière connexion
            $table->json('preferences')->nullable(); // Préférences utilisateur
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'first_name', 'last_name', 'phone', 'date_of_birth', 'gender',
                'address', 'avatar', 'school_id', 'class_id', 'student_number',
                'parent_email', 'parent_phone', 'status', 'last_login_at', 'preferences'
            ]);
        });
    }
};
