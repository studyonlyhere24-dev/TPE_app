import React from 'react';
import { useForm } from '@inertiajs/react';

export default function CreateContrat() {
    const { data, setData, post, processing, errors } = useForm({
        // En-tête
        type_contrat: 'Création',
        date_contrat: '',
        numero_contrat: '001',
        dre: '',
        agence: '',
        code_agence: '',
        
        // Informations Client
        raison_sociale: '',
        nom_commercial: '',
        adresse: '',
        commune: '',
        daira: '',
        wilaya: '',
        code_postal: '',
        telephone: '',
        fax: '',
        mobile: '',
        email: '',
        code_activite: '',
        
        // Equipement
        type_tpe: 'GPRS',
        nombre_tpe_demandes: 1,
        
        // Contacts
        nom_contact_principal: '',
        type_contact: 'propriétaire ou gérant',
        titre_travail_contact: '',
        nom_contact_2: '',
        
        // Informations financières et légales
        numero_rib: '', // 24 caractères
        registre_commerce: '',
        identifiant_fiscal: '',
        annees_commerce: ''
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        // On envoie vers l'URL /contrats (à vérifier plus tard)
        post('/nouveau-contrat');
    };

    return (
        <div className="max-w-4xl mx-auto p-6 bg-white shadow-md mt-10">
            <h1 className="text-2xl font-bold mb-6 text-center border-b pb-4">Nouveau Contrat</h1>
            
            <form onSubmit={submit} className="space-y-6 text-sm">
                
                {/* --- EN-TÊTE --- */}
                <div className="grid grid-cols-2 gap-6 border-b pb-4">
                    <div className="space-y-4">
                        <div className="flex space-x-4">
                            <label className="flex items-center space-x-2">
                                <input type="radio" name="type_contrat" value="Création" checked={data.type_contrat === 'Création'} onChange={e => setData('type_contrat', e.target.value)} />
                                <span>Création</span>
                            </label>
                            <label className="flex items-center space-x-2">
                                <input type="radio" name="type_contrat" value="Modification" checked={data.type_contrat === 'Modification'} onChange={e => setData('type_contrat', e.target.value)} />
                                <span>Modification</span>
                            </label>
                        </div>
                        <div>
                            <label className="font-bold">N° de Contrat</label>
                            <input type="text" className="w-full border p-2 mt-1" value={data.numero_contrat} onChange={e => setData('numero_contrat', e.target.value)} placeholder="001..." />
                        </div>
                    </div>
                    
                    <div className="space-y-2">
                        <div className="flex items-center">
                            <label className="w-32">Date :</label>
                            <input type="date" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.date_contrat} onChange={e => setData('date_contrat', e.target.value)} />
                        </div>
                        <div className="flex items-center">
                            <label className="w-32">DRE :</label>
                            <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.dre} onChange={e => setData('dre', e.target.value)} />
                        </div>
                        <div className="flex items-center">
                            <label className="w-32">Agence :</label>
                            <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.agence} onChange={e => setData('agence', e.target.value)} />
                        </div>
                        <div className="flex items-center">
                            <label className="w-32">Code agence :</label>
                            <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.code_agence} onChange={e => setData('code_agence', e.target.value)} />
                        </div>
                    </div>
                </div>

                {/* --- SECTION CLIENT --- */}
                <div className="space-y-3 border-b pb-4">
                    <div className="flex items-center">
                        <label className="w-40">Raison sociale :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.raison_sociale} onChange={e => setData('raison_sociale', e.target.value)} />
                    </div>
                    <div className="flex items-center">
                        <label className="w-40">Nom commercial :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.nom_commercial} onChange={e => setData('nom_commercial', e.target.value)} />
                    </div>
                    <div className="flex items-center">
                        <label className="w-40">Adresse :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.adresse} onChange={e => setData('adresse', e.target.value)} />
                    </div>
                    
                    <div className="grid grid-cols-2 gap-4">
                        <div className="flex items-center">
                            <label className="w-40">Commune :</label>
                            <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.commune} onChange={e => setData('commune', e.target.value)} />
                        </div>
                        <div className="flex items-center">
                            <label className="w-20">Daïra :</label>
                            <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.daira} onChange={e => setData('daira', e.target.value)} />
                        </div>
                    </div>

                    <div className="flex items-center">
                        <label className="w-40">Wilaya :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.wilaya} onChange={e => setData('wilaya', e.target.value)} />
                    </div>
                    <div className="flex items-center">
                        <label className="w-40">Code postal :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.code_postal} onChange={e => setData('code_postal', e.target.value)} />
                    </div>

                    <div className="grid grid-cols-2 gap-4">
                        <div className="flex items-center">
                            <label className="w-40">Téléphone :</label>
                            <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.telephone} onChange={e => setData('telephone', e.target.value)} />
                        </div>
                        <div className="flex items-center">
                            <label className="w-20">Fax :</label>
                            <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.fax} onChange={e => setData('fax', e.target.value)} />
                        </div>
                    </div>
                    
                    <div className="grid grid-cols-2 gap-4">
                        <div className="flex items-center">
                            <label className="w-40">Mobile :</label>
                            <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.mobile} onChange={e => setData('mobile', e.target.value)} />
                        </div>
                        <div className="flex items-center">
                            <label className="w-20">E.mail :</label>
                            <input type="email" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.email} onChange={e => setData('email', e.target.value)} />
                        </div>
                    </div>

                    <div className="flex items-center">
                        <label className="w-40">Code activité :</label>
                        <input type="text" className="w-1/3 border-b border-gray-400 focus:outline-none" value={data.code_activite} onChange={e => setData('code_activite', e.target.value)} />
                    </div>
                </div>

                {/* --- SECTION TPE & CONTACT --- */}
                <div className="space-y-4 border-b pb-4">
                    <div className="flex items-center space-x-6">
                        <span className="w-32">Type TPE :</span>
                        <label className="flex items-center space-x-1">
                            <input type="radio" name="type_tpe" value="GPRS" checked={data.type_tpe === 'GPRS'} onChange={e => setData('type_tpe', e.target.value)} />
                            <span>GPRS</span>
                        </label>
                        <label className="flex items-center space-x-1">
                            <input type="radio" name="type_tpe" value="Filaire" checked={data.type_tpe === 'Filaire'} onChange={e => setData('type_tpe', e.target.value)} />
                            <span>Filaire</span>
                        </label>
                        
                        <label className="ml-auto">Nombre TPE à installer :</label>
                        <input type="number" className="w-16 border p-1" value={data.nombre_tpe_demandes} onChange={e => setData('nombre_tpe_demandes', parseInt(e.target.value))} />
                    </div>

                    <div className="flex items-center">
                        <label className="w-48">Nom contact principal :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.nom_contact_principal} onChange={e => setData('nom_contact_principal', e.target.value)} />
                    </div>

                    <div className="flex items-center space-x-6">
                        <span className="w-40">Type du contact :</span>
                        <label className="flex items-center space-x-1">
                            <input type="radio" name="type_contact" value="propriétaire ou gérant" checked={data.type_contact === 'propriétaire ou gérant'} onChange={e => setData('type_contact', e.target.value)} />
                            <span>propriétaire ou gérant</span>
                        </label>
                        <label className="flex items-center space-x-1">
                            <input type="radio" name="type_contact" value="employé" checked={data.type_contact === 'employé'} onChange={e => setData('type_contact', e.target.value)} />
                            <span>employé</span>
                        </label>
                    </div>

                    <div className="flex items-center">
                        <label className="w-48">Titre de travail du contact :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.titre_travail_contact} onChange={e => setData('titre_travail_contact', e.target.value)} />
                    </div>

                    <div className="flex items-center">
                        <label className="w-48">Nom contact 2 :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.nom_contact_2} onChange={e => setData('nom_contact_2', e.target.value)} />
                    </div>
                </div>

                {/* --- SECTION LÉGALE --- */}
                <div className="space-y-4">
                    <div className="flex items-center">
                        <label className="w-48">N° de compte (RIB) :</label>
                        <input type="text" maxLength={24} className="flex-1 border-b border-gray-400 focus:outline-none tracking-widest font-mono" value={data.numero_rib} onChange={e => setData('numero_rib', e.target.value)} placeholder="000000000000000000000000" />
                    </div>
                    <div className="flex items-center">
                        <label className="w-48">N° de registre de com :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.registre_commerce} onChange={e => setData('registre_commerce', e.target.value)} />
                    </div>
                    <div className="flex items-center">
                        <label className="w-48">N° identifiant fiscal :</label>
                        <input type="text" className="flex-1 border-b border-gray-400 focus:outline-none" value={data.identifiant_fiscal} onChange={e => setData('identifiant_fiscal', e.target.value)} />
                    </div>
                    <div className="flex items-center">
                        <label className="w-56">Nombre d'années du commerce :</label>
                        <input type="number" className="w-24 border-b border-gray-400 focus:outline-none" value={data.annees_commerce} onChange={e => setData('annees_commerce', e.target.value)} />
                    </div>
                </div>

                {/* Bouton de soumission */}
                <div className="text-right mt-8">
                    <button type="submit" disabled={processing} className="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                        Enregistrer le contrat
                    </button>
                </div>
            </form>
        </div>
    );
}