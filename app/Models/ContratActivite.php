<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratActivite extends Model
{
    use HasFactory;

    // Autorise l'enregistrement de tous ces champs
    protected $fillable = [
        'client_id', 
        'numero_contrat', 
        'type_contrat', 
        'date_contrat',
        'dre', 
        'agence', 
        'code_agence', 
        'nom_commercial', 
        'code_activite',
        'numero_rib', 
        'type_tpe', 
        'nombre_tpe_demandes',
        'nom_contact_principal', 
        'type_contact', 
        'titre_travail_contact', 
        'nom_contact_2'
    ];

    // La relation : Un contrat appartient à un client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}