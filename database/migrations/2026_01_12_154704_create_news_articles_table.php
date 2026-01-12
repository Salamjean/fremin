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
        Schema::create('news_articles', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('category');
            $table->string('category_color')->default('bg-primary');
            $table->date('date');
            $table->string('type');
            $table->string('title');
            $table->text('excerpt');
            $table->integer('views')->default(0);
            $table->string('link')->nullable();
            $table->string('link_text')->default('Lire la suite');
            $table->boolean('is_event')->default(false);
            $table->date('event_date')->nullable();
            $table->integer('event_registrations')->default(0);
            $table->string('event_button_text')->default('S’inscrire');
            $table->string('event_button_icon')->default('fas fa-calendar-plus');
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
        Schema::dropIfExists('news_articles');
    }
};
