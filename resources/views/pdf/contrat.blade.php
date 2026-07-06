<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PV d'installation - {{ $contrat->numero_contrat }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px; /* Petite police pour tout faire rentrer */
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
            height: 100px; /* Espace pour le cachet et la signature */
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <td style="width: 50%;">Identifiant terminal : </td>
            <td style="width: 50%;">N° de caisse : </td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="2" class="section-header">Coordonnées de l'acceptant CIB (Commerçant ou Prestataire de services)</td>
        </tr>
        <tr>
            <td style="width: 50%;">Nom : </td>
            <td style="width: 50%;">Enseigne : {{ $contrat->client ? $contrat->client->raison_sociale : '' }}</td>
        </tr>
        <tr>
            <td>Prénom : </td>
            <td>Domaine d'activité : </td>
        </tr>
        <tr>
            <td>Adresse : </td>
            <td>N° Commerçant : {{ $contrat->numero_contrat }}</td>
        </tr>
        <tr>
            <td>Commune : </td>
            <td>Téléphone fixe : </td>
        </tr>
        <tr>
            <td>Daïra : </td>
            <td>Téléphone mobile : </td>
        </tr>
        <tr>
            <td>Wilaya : </td>
            <td>Fax : </td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="2" class="section-header">Coordonnées du technicien (DRE) chargé de l'installation</td>
        </tr>
        <tr>
            <td style="width: 50%;">Nom : </td>
            <td style="width: 50%;">Direction : </td>
        </tr>
        <tr>
            <td>Prénom : </td>
            <td>Adresse : </td>
        </tr>
        <tr>
            <td>Téléphone fixe : </td>
            <td>Ville : </td>
        </tr>
        <tr>
            <td>Téléphone mobile : </td>
            <td>Wilaya : </td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="2" class="section-header">Coordonnées de l'établissement Bancaire acquéreur & du Contact</td>
        </tr>
        <tr>
            <td style="width: 50%;">Banque : </td>
            <td style="width: 50%;">Nom du contact agence : </td>
        </tr>
        <tr>
            <td>Code Agence : </td>
            <td>Prénom du contact agence : </td>
        </tr>
        <tr>
            <td>Adresse : </td>
            <td>Fonction du contact agence : </td>
        </tr>
        <tr>
            <td>Ville : </td>
            <td>Tél. fixe du contact agence : </td>
        </tr>
        <tr>
            <td>Wilaya & code postal : </td>
            <td>Tél. mobile du contact agence : </td>
        </tr>
        <tr>
            <td>Téléphone : </td>
            <td>Fax de l'agence : </td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="2" class="section-header">Equipement installé</td>
        </tr>
        <tr>
            <td style="width: 50%;">Modèle TPE : {{ $contrat->type_tpe }}</td>
            <td style="width: 50%;">
                Modèle Base : <br><br>
                N° de Série Base : 
            </td>
        </tr>
        <tr>
            <td>N° de Série TPE : </td>
            <td>Opérateur télécom : Djezzy <span style="margin: 0 10px;">Ooredoo</span> Mobilis</td>
        </tr>
        <tr>
            <td>N° SIM : </td>
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
            <td>Terminal de paiement électronique (TPE)</td><td>01</td>
            <td>Rouleau papier :</td><td>01</td>
        </tr>
        <tr>
            <td>Cordon de ligne téléphonique</td><td>00</td>
            <td>Bloc d'alimentation</td><td>01</td>
        </tr>
        <tr>
            <td>Vitrophanie</td><td>01</td>
            <td>Cordon d'alimentation</td><td>01</td>
        </tr>
        <tr>
            <td>Base TPE</td><td>00</td>
            <td>SIM GPRS</td><td>01</td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 50%;" class="section-header">Visa Commerçant</td>
            <td style="width: 50%;" class="section-header">Visa installateur de la banque</td>
        </tr>
        <tr>
            <td class="signature-box">
                Fait à ...................................... le : <br><br>
                Signature et cachet du commerçant
            </td>
            <td class="signature-box">
                Fait à ...................................... le : <br><br>
                Signature et cachet de l'installateur :
            </td>
        </tr>
    </table>

</body>
</html>