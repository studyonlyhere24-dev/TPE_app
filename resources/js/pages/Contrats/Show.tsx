import React from 'react';
import { Head, Link } from '@inertiajs/react';

export default function ShowContrat({ contrat }) {
    return (
        <div className="max-w-4xl mx-auto p-6 bg-white shadow-md mt-10">
            <Head title={`Contrat N° ${contrat.numero_contrat}`} />
            
            {/* EN-TÊTE AVEC BOUTON PDF */}
            <div className="flex justify-between items-center border-b pb-4 mb-6">
                <h1 className="text-2xl font-bold">Consultation du Contrat</h1>
                
                <div className="space-x-4 flex items-center">
    <Link href="/contrats" className="text-gray-600 hover:underline">
        &larr; Retour à la liste
    </Link>
    
    {/* Bouton pour le Contrat (Noir) */}
    <a href={`/contrats/${contrat.id}/pdf`} target="_blank" className="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded inline-flex items-center">
        <svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        Contrat (PDF)
    </a>

    {/* Bouton pour le PV (Bleu) */}
    <a href={`/pv/${contrat.id}/pdf`} target="_blank" className="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
        <svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        PV d'installation (PDF)
    </a>
</div>
            </div>
            
            <div className="space-y-6 text-sm">
                
                {/* --- EN-TÊTE --- */}
                <div className="grid grid-cols-2 gap-6 border-b pb-4">
                    <div className="space-y-4">
                        <div className="flex space-x-4 font-bold text-lg">
                            <span>Type : <span className="text-blue-600 uppercase">{contrat.type_contrat}</span></span>
                        </div>
                        <div className="text-lg">
                            <span className="font-bold">N° de Contrat : </span>
                            <span className="border p-2 bg-gray-50 tracking-widest">{contrat.numero_contrat}</span>
                        </div>
                    </div>
                    
                    <div className="space-y-2 text-base">
                        <div className="flex"><span className="w-32 text-gray-600">Date :</span> <span className="font-semibold">{contrat.date_contrat || '---'}</span></div>
                        <div className="flex"><span className="w-32 text-gray-600">DRE :</span> <span className="font-semibold">{contrat.dre || '---'}</span></div>
                        <div className="flex"><span className="w-32 text-gray-600">Agence :</span> <span className="font-semibold">{contrat.agence || '---'}</span></div>
                        <div className="flex"><span className="w-32 text-gray-600">Code agence :</span> <span className="font-semibold">{contrat.code_agence || '---'}</span></div>
                    </div>
                </div>

                {/* --- SECTION CLIENT --- */}
                <div className="space-y-3 border-b pb-4">
                    <div className="flex"><span className="w-40 text-gray-600">Raison sociale :</span> <span className="flex-1 border-b font-semibold">{contrat.raison_sociale || '---'}</span></div>
                    <div className="flex"><span className="w-40 text-gray-600">Nom commercial :</span> <span className="flex-1 border-b font-semibold">{contrat.nom_commercial || '---'}</span></div>
                    <div className="flex"><span className="w-40 text-gray-600">Adresse :</span> <span className="flex-1 border-b font-semibold">{contrat.adresse || '---'}</span></div>
                    
                    <div className="grid grid-cols-2 gap-4">
                        <div className="flex"><span className="w-40 text-gray-600">Commune :</span> <span className="flex-1 border-b font-semibold">{contrat.commune || '---'}</span></div>
                        <div className="flex"><span className="w-20 text-gray-600">Daïra :</span> <span className="flex-1 border-b font-semibold">{contrat.daira || '---'}</span></div>
                    </div>

                    <div className="flex"><span className="w-40 text-gray-600">Wilaya :</span> <span className="flex-1 border-b font-semibold">{contrat.wilaya || '---'}</span></div>
                    <div className="flex"><span className="w-40 text-gray-600">Code postal :</span> <span className="flex-1 border-b font-semibold">{contrat.code_postal || '---'}</span></div>

                    <div className="grid grid-cols-2 gap-4">
                        <div className="flex"><span className="w-40 text-gray-600">Téléphone :</span> <span className="flex-1 border-b font-semibold">{contrat.telephone || '---'}</span></div>
                        <div className="flex"><span className="w-20 text-gray-600">Fax :</span> <span className="flex-1 border-b font-semibold">{contrat.fax || '---'}</span></div>
                    </div>
                    
                    <div className="grid grid-cols-2 gap-4">
                        <div className="flex"><span className="w-40 text-gray-600">Mobile :</span> <span className="flex-1 border-b font-semibold">{contrat.mobile || '---'}</span></div>
                        <div className="flex"><span className="w-20 text-gray-600">E.mail :</span> <span className="flex-1 border-b font-semibold">{contrat.email || '---'}</span></div>
                    </div>

                    <div className="flex"><span className="w-40 text-gray-600">Code activité :</span> <span className="w-1/3 border-b font-semibold">{contrat.code_activite || '---'}</span></div>
                </div>

                {/* --- SECTION TPE & CONTACT --- */}
                <div className="space-y-4 border-b pb-4">
                    <div className="flex items-center space-x-6">
                        <span className="w-32 text-gray-600">Type TPE :</span>
                        <span className="font-bold border px-3 py-1 bg-gray-50">{contrat.type_tpe}</span>
                        <span className="ml-auto text-gray-600">Nombre TPE à installer :</span>
                        <span className="font-bold border px-3 py-1 bg-gray-50">{contrat.nombre_tpe_demandes}</span>
                    </div>

                    <div className="flex"><span className="w-48 text-gray-600">Nom contact principal :</span> <span className="flex-1 border-b font-semibold">{contrat.nom_contact_principal || '---'}</span></div>
                    <div className="flex"><span className="w-48 text-gray-600">Type du contact :</span> <span className="flex-1 border-b font-semibold">{contrat.type_contact || '---'}</span></div>
                    <div className="flex"><span className="w-48 text-gray-600">Titre de travail du contact :</span> <span className="flex-1 border-b font-semibold">{contrat.titre_travail_contact || '---'}</span></div>
                    <div className="flex"><span className="w-48 text-gray-600">Nom contact 2 :</span> <span className="flex-1 border-b font-semibold">{contrat.nom_contact_2 || '---'}</span></div>
                </div>

                {/* --- SECTION LÉGALE --- */}
                <div className="space-y-4">
                    <div className="flex"><span className="w-48 text-gray-600">N° de compte (RIB) :</span> <span className="flex-1 border-b font-mono font-bold tracking-widest text-lg">{contrat.numero_rib || '---'}</span></div>
                    <div className="flex"><span className="w-48 text-gray-600">N° de registre de com :</span> <span className="flex-1 border-b font-semibold">{contrat.registre_commerce || '---'}</span></div>
                    <div className="flex"><span className="w-48 text-gray-600">N° identifiant fiscal :</span> <span className="flex-1 border-b font-semibold">{contrat.identifiant_fiscal || '---'}</span></div>
                    <div className="flex"><span className="w-56 text-gray-600">Nombre d'années du commerce :</span> <span className="w-24 border-b font-semibold">{contrat.annees_commerce || '---'}</span></div>
                </div>
            </div>
        </div>
    );
}