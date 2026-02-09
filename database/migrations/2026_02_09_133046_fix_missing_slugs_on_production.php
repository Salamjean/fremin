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
        // Missions
        \App\Models\MissionCard::all()->each(function ($card) {
            if (empty($card->slug)) {
                $card->slug = \Illuminate\Support\Str::slug($card->title);
                $card->save();
            }
        });

        // Governance
        \App\Models\GovernanceCard::all()->each(function ($card) {
            if (empty($card->slug)) {
                $card->slug = \Illuminate\Support\Str::slug($card->title);
                $card->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No rollback needed for data updates
    }
};
