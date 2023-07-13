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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('numero_manuel')->unique();
            $table->string('nom');
            $table->string('fondateur');
            $table->string('telephone');
            $table->string('adresse');
            $table->unsignedBigInteger('type_etablissement_id');
            $table->foreign('type_etablissement_id')->references('id')->on('type_etablissements')->onDelete('cascade');
            $table->unsignedBigInteger('zones_id');
            $table->foreign('zones_id')->references('id')->on('zones')->onDelete('cascade');
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
