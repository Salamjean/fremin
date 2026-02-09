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
        Schema::table('minister_infos', function (Blueprint $table) {
            if (!Schema::hasColumn('minister_infos', 'name_en')) {
                $table->string('name_en')->nullable()->after('name');
                $table->string('function_en')->nullable()->after('function');
                $table->text('message_en')->nullable()->after('message');
            }
        });

        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'title_en')) {
                $table->string('title_en')->nullable()->after('title');
                $table->text('description_en')->nullable()->after('description');
            }
        });

        Schema::table('news_articles', function (Blueprint $table) {
            if (!Schema::hasColumn('news_articles', 'title_en')) {
                $table->string('title_en')->nullable()->after('title');
                // Removed content_en as content column does not exist
                $table->text('excerpt_en')->nullable()->after('excerpt');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('minister_infos', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'function_en', 'message_en']);
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });

        Schema::table('news_articles', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'excerpt_en']);
        });
    }
};
