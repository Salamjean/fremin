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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable(); // "Qui sommes-nous ?"
            $table->string('section_subtitle')->nullable(); // "Structure placée sous la tutelle..."

            // Image principale
            $table->string('main_image')->nullable();
            $table->string('main_image_alt')->nullable();

            // Titre et contenu
            $table->string('content_title')->nullable(); 
            $table->text('content_text')->nullable(); 

            // Mission
            $table->string('mission_title')->nullable();
            $table->text('mission_text')->nullable();
            $table->string('mission_icon')->nullable(); 

            // Vision
            $table->string('vision_title')->nullable(); 
            $table->text('vision_text')->nullable();
            $table->string('vision_icon')->nullable(); 

            // Valeurs
            $table->string('values_title')->nullable(); 
            $table->text('values_text')->nullable();
            $table->string('values_icon')->nullable(); 

            // Fonctionnalités
            $table->string('feature1_title')->nullable(); 
            $table->string('feature1_text')->nullable(); 
            $table->string('feature1_icon')->nullable(); 

            $table->string('feature2_title')->nullable(); 
            $table->string('feature2_text')->nullable();
            $table->string('feature2_icon')->nullable(); 

            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
