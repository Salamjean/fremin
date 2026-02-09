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
        Schema::table('financed_companies', function (Blueprint $table) {
            if (!Schema::hasColumn('financed_companies', 'industry_en')) {
                $table->string('industry_en')->nullable()->after('industry');
                $table->string('description_en')->nullable()->after('description');
            }
        });

        Schema::table('team_members', function (Blueprint $table) {
            if (!Schema::hasColumn('team_members', 'position_en')) {
                $table->string('position_en')->nullable()->after('position');
                $table->text('bio_en')->nullable()->after('bio');
            }
        });

        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'sector_en')) {
                $table->string('sector_en')->nullable()->after('sector');
                $table->text('quote_en')->nullable()->after('quote');
                $table->string('author_position_en')->nullable()->after('author_position');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financed_companies', function (Blueprint $table) {
            $table->dropColumn(['industry_en', 'description_en']);
        });

        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['position_en', 'bio_en']);
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn(['sector_en', 'quote_en', 'author_position_en']);
        });
    }
};
