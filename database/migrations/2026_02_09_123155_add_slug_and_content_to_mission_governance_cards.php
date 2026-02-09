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
        Schema::table('mission_cards', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->longText('content')->nullable()->after('description');
            $table->longText('content_en')->nullable()->after('content');
        });

        Schema::table('governance_cards', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->longText('content')->nullable()->after('description');
            $table->longText('content_en')->nullable()->after('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mission_cards', function (Blueprint $table) {
            $table->dropColumn(['slug', 'content', 'content_en']);
        });

        Schema::table('governance_cards', function (Blueprint $table) {
            $table->dropColumn(['slug', 'content', 'content_en']);
        });
    }
};
