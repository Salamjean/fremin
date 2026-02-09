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
            if (!Schema::hasColumn('mission_cards', 'title_en')) {
                $table->string('title_en')->nullable()->after('title');
            }
            if (!Schema::hasColumn('mission_cards', 'description_en')) {
                $table->text('description_en')->nullable()->after('description');
            }
        });

        Schema::table('governance_cards', function (Blueprint $table) {
            if (!Schema::hasColumn('governance_cards', 'title_en')) {
                $table->string('title_en')->nullable()->after('title');
            }
            if (!Schema::hasColumn('governance_cards', 'description_en')) {
                $table->text('description_en')->nullable()->after('description');
            }
        });

        Schema::table('statistics', function (Blueprint $table) {
            if (!Schema::hasColumn('statistics', 'label_en')) {
                $table->string('label_en')->nullable()->after('label');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mission_cards', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });

        Schema::table('governance_cards', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });

        Schema::table('statistics', function (Blueprint $table) {
            $table->dropColumn(['label_en']);
        });
    }
};
