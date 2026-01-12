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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('location');
            $table->enum('location_type', ['in_person', 'online', 'hybrid'])->default('in_person');
            $table->string('month_short');
            $table->string('month_full')->nullable();
            $table->integer('day');
            $table->integer('year');
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->default('En savoir plus');
            $table->string('button_link')->nullable();
            $table->string('button_class')->default('btn-primary');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
