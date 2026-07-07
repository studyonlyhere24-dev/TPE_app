<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PV d'installation - {{ $contrat->numero_contrat }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }
        th, td {
            border: 1px solid black;
            padding: 4px 6px;
            vertical-align: top;
        }
        .section-header {
            background-color: black;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
        }
        .signature-box {
            height: 100px;
        }
        .dots {
            color: #777;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <td style="width: 50%;">Identifiant terminal : <span class="dots">...........................................</span></td>
            <td style="width: 50%;">N° de caisse : <span class="dots">...........................................</span></td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="2" class="section-header">Coordonnées de l'acceptant CIB (Commerçant ou Prestataire de services)</td>
        </tr>
        <tr>
            <td style="width: 50%;">Raison Sociale : <strong>{{ $contrat->client->raison_sociale ?? '' }}</strong></td>
            <td style="width: 50%;">Enseigne : <strong>{{ $contrat->nom_commercial }}</strong></td>
        </tr>
        <tr>
            <td>Nom & Prénom Contact : <strong>{{ $contrat->nom_contact_principal }}</strong></td>
            <td>Domaine d'activité : <strong>{{ $contrat->code_activite }}</strong></td>
        </tr>
        <tr>
            <td>Adresse : <strong>{{ $contrat->client->adresse ?? '' }}</strong></td>
            <td>N° Commerçant (Contrat) : <strong>{{ $contrat->numero_contrat }}</strong></td>
        </tr>
        <tr>
            <td>Commune : <strong>{{ $contrat->client->commune ?? '' }}</strong></td>
            <td>Téléphone fixe : <strong>{{ $contrat->client->telephone ?? '' }}</strong></td>
        </tr>
        <tr>
            <td>Daïra : <strong>{{ $contrat->client->daira ?? '' }}</strong></td>
            <td>Téléphone mobile : <strong>{{ $contrat->client->mobile ?? '' }}</strong></td>
        </tr>
        <tr>
            <td>Wilaya & CP : <strong>{{ $contrat->client->wilaya ?? '' }} {{ $contrat->client->code_postal ?? '' }}</strong></td>
            <td>Fax : <strong>{{ $contrat->client->fax ?? '' }}</strong></td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="2" class="section-header">Coordonnées du technicien (DRE) chargé de l'installation</td>
        </tr>
        <tr>
            <td style="width: 50%;">Nom : <span class="dots">...................................................</span></td>
            <td style="width: 50%;">Direction : <span class="dots">...............................................</span></td>
        </tr>
        <tr>
            <td>Prénom : <span class="dots">...............................................</span></td>
            <td>Adresse : <span class="dots">................................................</span></td>
        </tr>
        <tr>
            <td>Téléphone fixe : <span class="dots">.......................................</span></td>
            <td>Ville : <span class="dots">......................................................</span></td>
        </tr>
        <tr>
            <td>Téléphone mobile : <span class="dots">..................................</span></td>
            <td>Wilaya : <span class="dots">..................................................</span></td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="2" class="section-header">Coordonnées de l'établissement Bancaire acquéreur & du Contact</td>
        </tr>
        <tr>
            <td style="width: 50%;">Banque : <span class="dots">...................................................</span></td>
            <td style="width: 50%;">Nom du contact agence : <span class="dots">............................</span></td>
        </tr>
        <tr>
            <td>Code Agence : <span class="dots">.........................................</span></td>
            <td>Prénom du contact agence : <span class="dots">.........................</span></td>
        </tr>
        <tr>
            <td>Adresse : <span class="dots">................................................</span></td>
            <td>Fonction du contact agence : <span class="dots">.........................</span></td>
        </tr>
        <tr>
            <td>Ville : <span class="dots">......................................................</span></td>
            <td>Tél. fixe du contact agence : <span class="dots">........................</span></td>
        </tr>
        <tr>
            <td>Wilaya & code postal : <span class="dots">..............................</span></td>
            <td>Tél. mobile du contact agence : <span class="dots">.....................</span></td>
        </tr>
        <tr>
            <td>Téléphone : <span class="dots">.............................................</span></td>
            <td>Fax de l'agence : <span class="dots">.......................................</span></td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="2" class="section-header">Equipement installé</td>
        </tr>
        <tr>
            <td style="width: 50%;">Modèle TPE : <strong>{{ $contrat->type_tpe }}</strong></td>
            <td style="width: 50%;">
                Modèle Base : <span class="dots">...........................................</span><br><br>
                N° de Série Base : <span class="dots">......................................</span>
            </td>
        </tr>
        <tr>
            <td>N° de Série TPE : <span class="dots">.....................................</span></td>
            <td>Opérateur télécom : Djezzy &nbsp;&nbsp;&nbsp; Ooredoo &nbsp;&nbsp;&nbsp; Mobilis</td>
        </tr>
        <tr>
            <td>N° SIM : <span class="dots">...................................................</span></td>
            <td></td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="4" class="section-header">Détail composants matériels livrés</td>
        </tr>
        <tr style="font-weight: bold; background-color: #f0f0f0;">
            <td style="width: 40%;">Description du composant</td>
            <td style="width: 10%;">Nbre</td>
            <td style="width: 40%;">Description du composant</td>
            <td style="width: 10%;">Nbre</td>
        </tr>
        <tr>
            <td>Terminal de paiement électronique (TPE)</td><td><strong>{{ sprintf('%02d', $contrat->nombre_tpe_demandes) }}</strong></td>
            <td>Rouleau papier :</td><td><span class="dots">.....</span></td>
        </tr>
        <tr>
            <td>Cordon de ligne téléphonique</td><td><span class="dots">.....</span></td>
            <td>Bloc d'alimentation</td><td><span class="dots">.....</span></td>
        </tr>
        <tr>
            <td>Vitrophanie</td><td><span class="dots">.....</span></td>
            <td>Cordon d'alimentation</td><td><span class="dots">.....</span></td>
        </tr>
        <tr>
            <td>Base TPE</td><td><span class="dots">.....</span></td>
            <td>SIM GPRS</td><td><span class="dots">.....</span></td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 50%;" class="section-header">Visa Commerçant</td>
            <td style="width: 50%;" class="section-header">Visa installateur de la banque</td>
        </tr>
        <tr>
            <td class="signature-box">
                Fait à <span class="dots">......................................</span> le : <span class="dots">...................</span><br><br>
                Signature et cachet du commerçant
            </td>
            <td class="signature-box">
                Fait à <span class="dots">......................................</span> le : <span class="dots">...................</span><br><br>
                Signature et cachet de l'installateur :
            </td>
        </tr>
    </table>

</body>
</html>