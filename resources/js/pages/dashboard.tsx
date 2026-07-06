import AppLayout from '@/layouts/app-layout';
import { Head, Link } from '@inertiajs/react';

export default function Dashboard({ auth, contrats }) {
    return (
        <AppLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Tableau de Bord - Liste des Contrats</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    {/* Bouton pour ajouter un nouveau contrat */}
                    <div className="mb-6 flex justify-end">
                        <Link href="/nouveau-contrat" 
                              className="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">
                            + Nouveau Contrat
                        </Link>
                    </div>

                    {/* Le Tableau */}
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 overflow-x-auto">
                            
                            <table className="min-w-full text-left text-sm whitespace-nowrap">
                                <thead className="uppercase tracking-wider border-b-2 border-gray-200 bg-gray-50">
                                    <tr>
                                        <th className="px-6 py-4 font-bold text-gray-600">N° Contrat</th>
                                        <th className="px-6 py-4 font-bold text-gray-600">Client (Raison Sociale)</th>
                                        <th className="px-6 py-4 font-bold text-gray-600">Date</th>
                                        <th className="px-6 py-4 font-bold text-gray-600">Type TPE</th>
                                        <th className="px-6 py-4 font-bold text-gray-600">Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    {/* S'il n'y a aucun contrat, on affiche un petit message */}
                                    {contrats.length === 0 ? (
                                        <tr>
                                            <td colSpan="5" className="px-6 py-4 text-center text-gray-500 italic">
                                                Aucun contrat n'a été enregistré pour le moment.
                                            </td>
                                        </tr>
                                    ) : (
                                        /* Sinon, on boucle sur chaque contrat pour créer une ligne (tr) */
                                        contrats.map((contrat) => (
                                            <tr key={contrat.id} className="border-b border-gray-200 hover:bg-gray-100 transition duration-150">
                                                <td className="px-6 py-4 font-medium">{contrat.numero_contrat}</td>
                                                {/* On accède au nom du client grâce à la relation 'client' */}
                                                <td className="px-6 py-4">{contrat.client ? contrat.client.raison_sociale : 'N/A'}</td>
                                                <td className="px-6 py-4">{contrat.date_contrat || 'Non définie'}</td>
                                                <td className="px-6 py-4">
                                                    <span className="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-bold">
                                                        {contrat.type_tpe || 'N/A'}
                                                    </span>
                                                </td>
                                                <td className="px-6 py-4 flex gap-2">
                                                    <button className="text-indigo-600 hover:text-indigo-900 font-medium">Consulter</button>
<a 
    href={`/contrats/${contrat.id}/pdf`} 
    className="text-red-600 hover:text-red-900 font-medium"
>
    Générer PV
</a>                                                </td>
                                            </tr>
                                        ))
                                    )}
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}