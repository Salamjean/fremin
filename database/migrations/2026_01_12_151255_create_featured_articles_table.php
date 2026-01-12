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
        Schema::create('featured_articles', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->default('À la Une');
            $table->string('badge_icon')->default('fas fa-star');
            $table->string('image');
            $table->string('image_alt')->nullable();
            $table->string('category')->nullable();
            $table->date('publication_date');
            $table->integer('views')->default(0);
            $table->string('title');
            $table->text('excerpt');
            $table->string('read_more_text')->default('Lire l’article complet');
            $table->string('read_more_link')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_articles');
    }
};
