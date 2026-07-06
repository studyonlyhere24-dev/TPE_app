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
    Schema::create('clients', function (Blueprint $table) {
        $table->id(); // id_client
        $table->string('raison_sociale'); // Nom ou Raison sociale
        $table->string('adresse')->nullable();
        $table->string('commune')->nullable();
        $table->string('daira')->nullable();
        $table->string('wilaya')->nullable();
        $table->string('code_postal')->nullable();
        $table->string('telephone')->nullable();
        $table->string('mobile')->nullable();
        $table->string('fax')->nullable();
        $table->string('email')->nullable();
        $table->string('registre_commerce')->nullable();
        $table->string('identifiant_fiscal')->nullable();
        $table->integer('annees_commerce')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
