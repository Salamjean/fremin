<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('hero_sections')) {
            Schema::create('hero_sections', function (Blueprint $table) {
                $table->id();
                $table->string('main_title'); // Titre principal (ex: À PROPOS DE NOUS)
                $table->string('subtitle')->nullable(); // Sous-titre (ex: NOTRE MISSION)
                $table->text('description')->nullable(); // Description courte
                $table->string('image')->nullable(); // Image de fond
                $table->string('image_alt')->nullable(); // Texte alternatif de l'image
                $table->string('stat_number')->nullable(); // Chiffre clé (optionnel)
                $table->string('stat_label')->nullable(); // Libellé du chiffre clé
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
