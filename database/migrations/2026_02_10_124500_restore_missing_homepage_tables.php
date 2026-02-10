<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Carousels
        if (!Schema::hasTable('carousels')) {
            Schema::create('carousels', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('subtitle')->nullable();
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->string('video_link')->nullable(); // Added based on error log history
                $table->string('layout')->default('left');
                $table->string('button_text')->nullable();
                $table->string('button_link')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 2. Team Members
        if (!Schema::hasTable('team_members')) {
            Schema::create('team_members', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('position');
                $table->string('image')->nullable();
                $table->text('bio')->nullable();
                $table->boolean('is_president')->default(false);
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 3. Statistics
        if (!Schema::hasTable('statistics')) {
            Schema::create('statistics', function (Blueprint $table) {
                $table->id();
                $table->string('label');
                $table->string('value');
                $table->string('icon')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 4. Partners
        if (!Schema::hasTable('partners')) {
            Schema::create('partners', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('logo')->nullable();
                $table->string('website_url')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 5. Testimonials
        if (!Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('company_name')->nullable();
                $table->string('sector')->nullable();
                $table->text('quote')->nullable();
                $table->string('author_name')->nullable();
                $table->string('author_position')->nullable();
                $table->integer('rating')->default(5);
                $table->string('company_logo')->nullable();
                $table->string('photo_path')->nullable(); // Added based on view check
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 6. Mission Cards
        if (!Schema::hasTable('mission_cards')) {
            Schema::create('mission_cards', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->nullable();
                $table->string('icon')->nullable();
                $table->text('description')->nullable();
                $table->string('link')->nullable();
                $table->string('theme')->nullable();
                $table->json('list_items')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 7. Governance Cards
        if (!Schema::hasTable('governance_cards')) {
            Schema::create('governance_cards', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->nullable();
                $table->string('icon')->nullable();
                $table->text('description')->nullable();
                $table->string('link')->nullable();
                $table->json('list_items')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 8. Financed Companies
        if (!Schema::hasTable('financed_companies')) {
            Schema::create('financed_companies', function (Blueprint $table) {
                $table->id();
                $table->string('company_name');
                $table->string('industry')->nullable();
                $table->string('image_before')->nullable();
                $table->string('image_after')->nullable();
                $table->text('description')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('financed_companies');
        Schema::dropIfExists('governance_cards');
        Schema::dropIfExists('mission_cards');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('statistics');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('carousels');
    }
};
