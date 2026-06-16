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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->text('title_offre');
            $table->string('title_link_offre');
            $table->text('desc_offre');
            $table->text('content_offre');
            $table->text('image_offre');
            $table->text('slug_offre');
            $table->foreignId('typeoffre_id')->index();
            $table->bigInteger('view_offre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
