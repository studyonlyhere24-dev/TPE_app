<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Autorise l'enregistrement de tous ces champs
    protected $fillable = [
        'raison_sociale', 
        'adresse', 
        'commune', 
        'daira', 
        'wilaya',
        'code_postal', 
        'telephone', 
        'mobile', 
        'fax', 
        'email',
        'registre_commerce', 
        'identifiant_fiscal', 
        'annees_commerce'
    ];

    // La relation : Un client a plusieurs contrats
    public function contrats()
    {
        return $this->hasMany(ContratActivite::class);
    }
}