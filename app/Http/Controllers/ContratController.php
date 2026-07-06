<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ContratActivite;
use Inertia\Inertia;

class ContratController extends Controller
{
    // Affiche la page React du formulaire
    public function create()
    {
        return Inertia::render('Contrats/Create');
    }

    // Reçoit et sauvegarde les données du formulaire
    public function store(Request $request)
    {
        // 1. Validation des données (on s'assure que les champs obligatoires sont remplis)
        $validated = $request->validate([
            'numero_contrat' => 'required|string|unique:contrat_activites,numero_contrat',
            'raison_sociale' => 'required|string|max:150',
            'nom_commercial' => 'required|string|max:150',
            'numero_rib' => 'required|string|size:24', // Le fameux verrou à 24 caractères du PDF
            'nombre_tpe_demandes' => 'required|integer|min:1',
            // On pourrait ajouter les autres champs ici, mais gardons ça simple pour tester
        ]);

        // 2. Création du Client (on utilise 'firstOrCreate' au cas où le client existe déjà)
        $client = Client::firstOrCreate(
            ['raison_sociale' => $request->raison_sociale], // Condition de recherche
            $request->all() // Données à insérer s'il n'existe pas
        );

        // 3. Création du Contrat et liaison avec le Client
        $contrat = $client->contrats()->create([
            'numero_contrat' => $request->numero_contrat,
            'nom_commercial' => $request->nom_commercial,
            'numero_rib' => $request->numero_rib,
            'nombre_tpe_demandes' => $request->nombre_tpe_demandes,
            'agence' => $request->agence,
            // On fusionne le reste des données du formulaire
        ] + $request->all());

        // 4. On redirige vers le tableau de bord avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Contrat créé avec succès !');
    }
    
    public function genererPDF($id)
    {
        // 1. On récupère le bon contrat avec les infos de son client
        $contrat = \App\Models\ContratActivite::with('client')->findOrFail($id);
        
        // 2. On charge une vue HTML (que l'on va créer à la prochaine étape) et on lui donne les données
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.contrat', compact('contrat'));
        
        // 3. On génère et on télécharge le PDF (en le nommant dynamiquement avec son numéro)
        return $pdf->download('PV_Contrat_' . $contrat->numero_contrat . '.pdf');
    }
}