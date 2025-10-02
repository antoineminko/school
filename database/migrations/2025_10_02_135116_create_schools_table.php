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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'école
            $table->string('code')->unique(); // Code unique de l'école
            $table->text('address')->nullable(); // Adresse complète
            $table->string('phone')->nullable(); // Téléphone
            $table->string('email')->nullable(); // Email de contact
            $table->string('website')->nullable(); // Site web
            $table->string('director_name')->nullable(); // Nom du directeur
            $table->text('description')->nullable(); // Description de l'école
            $table->string('logo')->nullable(); // Chemin vers le logo
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
