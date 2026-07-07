<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ContratActivite;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;

class ContratController extends Controller
{
    public function create()
    {
        return Inertia::render('Contrats/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_contrat' => 'required|string|unique:contrat_activites,numero_contrat',
            'raison_sociale' => 'required|string|max:150',
            'nom_commercial' => 'required|string|max:150',
            'numero_rib' => 'required|string|size:24',
            'nombre_tpe_demandes' => 'required|integer|min:1',
            // On pourrait ajouter les autres champs ici, mais gardons ça simple pour tester
        ]);

        // 2. Création du Client (on utilise 'firstOrCreate' au cas où le client existe déjà)
        $client = Client::firstOrCreate(
            ['raison_sociale' => $request->raison_sociale], // Condition de recherche
            $request->all() // Données à insérer s'il n'existe pas
        );
        
        $contrat = $client->contrats()->create([
            'numero_contrat' => $request->numero_contrat,
            'nom_commercial' => $request->nom_commercial,
            'numero_rib' => $request->numero_rib,
            'nombre_tpe_demandes' => $request->nombre_tpe_demandes,
            'agence' => $request->agence,
        ] + $request->all());

        return redirect()->route('dashboard')->with('success', 'Contrat créé avec succès !');
    }

    public function genererPDF($id)
    {
        $contrat = \App\Models\ContratActivite::with('client')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.contrat', compact('contrat'));
        return $pdf->stream('Contrat_' . $contrat->numero_contrat . '.pdf');
    }

    public function show($id)
    {
        $contrat = \App\Models\ContratActivite::with('client')->findOrFail($id);
        $data = [
            'id' => $contrat->id,
            'numero_contrat' => $contrat->numero_contrat,
            'type_contrat' => $contrat->type_contrat,
            'date_contrat' => $contrat->date_contrat,
            'dre' => $contrat->dre,
            'agence' => $contrat->agence,
            'code_agence' => $contrat->code_agence,
            'raison_sociale' => $contrat->client->raison_sociale ?? '',
            'nom_commercial' => $contrat->nom_commercial,
            'adresse' => $contrat->client->adresse ?? '',
            'commune' => $contrat->client->commune ?? '',
            'daira' => $contrat->client->daira ?? '',
            'wilaya' => $contrat->client->wilaya ?? '',
            'code_postal' => $contrat->client->code_postal ?? '',
            'telephone' => $contrat->client->telephone ?? '',
            'fax' => $contrat->client->fax ?? '',
            'mobile' => $contrat->client->mobile ?? '',
            'email' => $contrat->client->email ?? '',
            'code_activite' => $contrat->code_activite,
            'type_tpe' => $contrat->type_tpe,
            'nombre_tpe_demandes' => $contrat->nombre_tpe_demandes,
            'nom_contact_principal' => $contrat->nom_contact_principal,
            'type_contact' => $contrat->type_contact,
            'titre_travail_contact' => $contrat->titre_travail_contact,
            'nom_contact_2' => $contrat->nom_contact_2,
            'numero_rib' => $contrat->numero_rib,
            'registre_commerce' => $contrat->client->registre_commerce ?? '',
            'identifiant_fiscal' => $contrat->client->identifiant_fiscal ?? '',
            'annees_commerce' => $contrat->client->annees_commerce ?? ''
        ];
        return inertia('Contrats/Show', [
            'contrat' => $data
        ]);
    }
}