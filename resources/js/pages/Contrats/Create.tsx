import AppLayout from '@/layouts/app-layout';
import { Head, useForm } from '@inertiajs/react';

export default function Create({ auth }) {
    // Initialisation du formulaire avec Inertia
    const { data, setData, post, processing, errors } = useForm({
        // Infos Contrat
        numero_contrat: '',
        type_contrat: 'Création',
        date_contrat: '',
        dre: '',
        agence: '',
        code_agence: '',
        
        // Infos Client (Juridique)
        raison_sociale: '',
        registre_commerce: '',
        identifiant_fiscal: '',
        annees_commerce: '',
        
        // Adresse et Contact
        adresse: '',
        commune: '',
        daira: '',
        wilaya: '',
        telephone: '',
        mobile: '',
        email: '',
        
        // Activité & Banque
        nom_commercial: '',
        code_activite: '',
        numero_rib: '',
        
        // TPE Logistique
        type_tpe: 'GPRS',
        nombre_tpe_demandes: 1,
        
        // Contact sur place
        nom_contact_principal: '',
        titre_travail_contact: '',
    });

    // Fonction d'envoi des données vers Laravel
    const submit = (e) => {
        e.preventDefault();
        // Envoie les données à la route 'contrats.store' qu'on a créée dans web.php
        post('/nouveau-contrat');
    };

    return (
        <AppLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Saisie d'un Nouveau Contrat TPE</h2>}
        >
            <Head title="Nouveau Contrat" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                        
                        <form onSubmit={submit} className="space-y-8">
                            
                            {/* SECTION 1 : RÉFÉRENCES DU CONTRAT */}
                            <div>
                                <h3 className="text-lg font-bold text-gray-900 border-b pb-2 mb-4">1. Références du Contrat</h3>
                                <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">N° de Contrat *</label>
                                        <input type="text" value={data.numero_contrat} onChange={e => setData('numero_contrat', e.target.value)} required
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                        {errors.numero_contrat && <span className="text-red-600 text-sm">{errors.numero_contrat}</span>}
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">Date du contrat</label>
                                        <input type="date" value={data.date_contrat} onChange={e => setData('date_contrat', e.target.value)}
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">Agence / Code Agence</label>
                                        <div className="flex gap-2">
                                            <input type="text" placeholder="Nom Agence" value={data.agence} onChange={e => setData('agence', e.target.value)}
                                                className="mt-1 block w-2/3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                            <input type="text" placeholder="Code" value={data.code_agence} onChange={e => setData('code_agence', e.target.value)}
                                                className="mt-1 block w-1/3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {/* SECTION 2 : ENTITÉ JURIDIQUE (CLIENT) */}
                            <div>
                                <h3 className="text-lg font-bold text-gray-900 border-b pb-2 mb-4">2. Entité Juridique (Le Client)</h3>
                                <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div className="col-span-1 md:col-span-3">
                                        <label className="block text-sm font-medium text-gray-700">Raison Sociale / Nom du signataire *</label>
                                        <input type="text" value={data.raison_sociale} onChange={e => setData('raison_sociale', e.target.value)} required
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                        {errors.raison_sociale && <span className="text-red-600 text-sm">{errors.raison_sociale}</span>}
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">N° Registre de Commerce</label>
                                        <input type="text" value={data.registre_commerce} onChange={e => setData('registre_commerce', e.target.value)}
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">NIF (Identifiant Fiscal)</label>
                                        <input type="text" value={data.identifiant_fiscal} onChange={e => setData('identifiant_fiscal', e.target.value)}
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">N° Mobile</label>
                                        <input type="text" value={data.mobile} onChange={e => setData('mobile', e.target.value)}
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                    </div>
                                </div>
                            </div>

                            {/* SECTION 3 : ACTIVITÉ ET FINANCE (LA RÈGLE D'OR DPAC) */}
                            <div>
                                <h3 className="text-lg font-bold text-gray-900 border-b pb-2 mb-4">3. Activité Commerciale & Finance</h3>
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">Nom Commercial (Enseigne) *</label>
                                        <input type="text" value={data.nom_commercial} onChange={e => setData('nom_commercial', e.target.value)} required
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                        {errors.nom_commercial && <span className="text-red-600 text-sm">{errors.nom_commercial}</span>}
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">Numéro de Compte / RIB *</label>
                                        <input type="text" maxLength="24" value={data.numero_rib} onChange={e => setData('numero_rib', e.target.value)} required
                                            placeholder="24 chiffres obligatoires"
                                            className="mt-1 block w-full font-mono border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                        {errors.numero_rib && <span className="text-red-600 text-sm">{errors.numero_rib}</span>}
                                    </div>
                                </div>
                            </div>

                            {/* SECTION 4 : LOGISTIQUE TPE */}
                            <div className="bg-gray-50 p-4 rounded-md border border-gray-200">
                                <h3 className="text-lg font-bold text-gray-900 mb-4">4. Demande Matériel (TPE)</h3>
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">Type de TPE demandé</label>
                                        <select value={data.type_tpe} onChange={e => setData('type_tpe', e.target.value)}
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="GPRS">GPRS (Puce SIM)</option>
                                            <option value="Fixe">Fixe (Ligne téléphonique)</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label className="block text-sm font-medium text-gray-700">Nombre de TPE à installer *</label>
                                        <input type="number" min="1" value={data.nombre_tpe_demandes} onChange={e => setData('nombre_tpe_demandes', e.target.value)} required
                                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                                        {errors.nombre_tpe_demandes && <span className="text-red-600 text-sm">{errors.nombre_tpe_demandes}</span>}
                                    </div>
                                </div>
                            </div>

                            {/* BOUTON DE SOUMISSION */}
                            <div className="flex justify-end pt-6">
                                <button type="submit" disabled={processing} 
                                    className="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded shadow-md transition duration-150 disabled:opacity-50">
                                    {processing ? 'Enregistrement...' : 'Enregistrer le contrat et générer le PV'}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}