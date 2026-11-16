<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('publicites', function (Blueprint $table) {
            // Autorisation explicite : les publicités existantes restent non diffusées sur TV
            // jusqu'à ce qu'un administrateur coche l'option dans leur fiche.
            $table->boolean('diffusion_tv_pub')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('publicites', function (Blueprint $table) {
            $table->dropColumn('diffusion_tv_pub');
        });
    }
};
