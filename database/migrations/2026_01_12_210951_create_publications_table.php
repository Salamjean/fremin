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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->text('description'); 
            $table->enum('type', ['rapport', 'etude', 'guide', 'brochure', 'autre'])->default('rapport');
            $table->string('file_path'); 
            $table->string('file_name');
            $table->string('file_size')->nullable(); 
            $table->string('file_format')->default('PDF'); 
            $table->integer('page_count')->nullable(); 
            $table->string('thumbnail')->nullable(); 
            $table->string('thumbnail_alt')->nullable();
            $table->date('publication_date');
            $table->string('period')->nullable();
            $table->string('language')->default('fr'); 
            $table->string('isbn')->nullable();
            $table->string('author')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('downloads')->default(0);
            $table->integer('views')->default(0);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
