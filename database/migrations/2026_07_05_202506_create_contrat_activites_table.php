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
    Schema::create('contrat_activites', function (Blueprint $table) {
        $table->id(); // id_contrat
        // La Règle d'Or 1 : Clé étrangère vers le Client
        $table->foreignId('client_id')->constrained('clients')->onDelete('restrict');
        
        $table->string('numero_contrat')->unique();
        $table->string('type_contrat')->default('Création'); // Création ou Modification
        $table->date('date_contrat')->nullable();
        $table->string('dre')->nullable();
        $table->string('agence')->nullable();
        $table->string('code_agence')->nullable();
        
        $table->string('nom_commercial'); // L'enseigne physique
        $table->string('code_activite')->nullable();
        
        // La Règle d'Or 2 : Le RIB à 24 caractères
        $table->string('numero_rib', 24); 
        
        // Logistique
        $table->string('type_tpe')->nullable(); // GPRS ou Filaire
        $table->integer('nombre_tpe_demandes')->default(1);
        
        // Contacts spécifiques à l'activité
        $table->string('nom_contact_principal')->nullable();
        $table->string('type_contact')->nullable(); // propriétaire, gérant, employé
        $table->string('titre_travail_contact')->nullable();
        $table->string('nom_contact_2')->nullable();
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrat_activites');
    }
};
