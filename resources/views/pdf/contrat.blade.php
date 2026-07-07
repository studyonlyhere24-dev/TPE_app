<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contrat N° {{ $contrat->numero_contrat }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 13px;
            color: #000;
            margin: 0;
            padding: 0;
        }
        /* Utilitaires pour imiter le design */
        .checkbox {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 2px solid #000;
            text-align: center;
            line-height: 14px;
            font-weight: bold;
            font-size: 14px;
            margin-right: 5px;
            vertical-align: middle;
        }
        .ligne-pointillee {
            border-bottom: 2px dotted #000;
        }
        .ligne-continue {
            border-bottom: 1px solid #000;
        }
        .font-mono {
            font-family: "Courier New", Courier, monospace;
        }
        /* Structure de base */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 5px 0;
            vertical-align: bottom;
        }
        .label {
            padding-right: 10px;
            white-space: nowrap;
        }
        .cadre-principal {
            border: 1px solid #000;
            padding: 15px 25px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <table style="margin-bottom: 10px;">
        <tr>
            <td style="width: 50%; vertical-align: top; padding-right: 40px;">
                
                <div style="margin-bottom: 25px; margin-left: 20px;">
                    <span style="font-size: 16px; font-weight: bold;">
                        <span class="checkbox">{{ $contrat->type_contrat == 'Création' ? 'X' : '' }}</span> Création
                    </span>
                    <span style="display: inline-block; width: 30px;"></span>
                    <span style="font-size: 16px; font-weight: bold;">
                        <span class="checkbox">{{ $contrat->type_contrat == 'Modification' ? 'X' : '' }}</span> Modification
                    </span>
                </div>

                <div style="border: 2px solid #000; padding: 10px; width: 80%; height: 60px;">
                    <div style="font-weight: bold; font-size: 14px; margin-bottom: 15px;">N° de Contrat</div>
                    <div class="ligne-continue font-mono" style="text-align: center; font-size: 18px; letter-spacing: 5px;">
                        {{ $contrat->numero_contrat }}
                    </div>
                </div>

            </td>

            <td style="width: 50%; vertical-align: top;">
                <table>
                    <tr>
                        <td class="label" style="width: 80px;">Date</td>
                        <td class="ligne-pointillee">{{ $contrat->date_contrat ? \Carbon\Carbon::parse($contrat->date_contrat)->format('d/m/Y') : '' }}</td>
                    </tr>
                    <tr>
                        <td class="label">DRE</td>
                        <td class="ligne-pointillee">{{ $contrat->dre }}</td>
                    </tr>
                    <tr>
                        <td class="label">Agence</td>
                        <td class="ligne-pointillee">{{ $contrat->agence }}</td>
                    </tr>
                    <tr>
                        <td class="label">Code agence</td>
                        <td class="ligne-pointillee">{{ $contrat->code_agence }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


    <div class="cadre-principal">
        
        <table>
            <tr><td class="label" style="width: 120px;">Raison sociale :</td><td class="ligne-continue">{{ $contrat->client->raison_sociale ?? '' }}</td></tr>
            <tr><td class="label">Nom commercial :</td><td class="ligne-continue">{{ $contrat->nom_commercial }}</td></tr>
            <tr><td class="label">Adresse :</td><td class="ligne-continue">{{ $contrat->client->adresse ?? '' }}</td></tr>
        </table>

        <table>
            <tr>
                <td class="label" style="width: 90px;">Commune :</td><td class="ligne-continue">{{ $contrat->client->commune ?? '' }}</td>
                <td class="label" style="width: 60px; padding-left: 15px;">Daïra :</td><td class="ligne-continue" style="width: 35%;">{{ $contrat->client->daira ?? '' }}</td>
            </tr>
        </table>

        <table>
            <tr><td class="label" style="width: 90px;">Wilaya :</td><td class="ligne-continue">{{ $contrat->client->wilaya ?? '' }}</td></tr>
            <tr><td class="label">Code postal :</td><td class="ligne-continue">{{ $contrat->client->code_postal ?? '' }}</td></tr>
        </table>

        <table>
            <tr>
                <td class="label" style="width: 90px;">Téléphone :</td><td class="ligne-continue" style="width: 30%;">{{ $contrat->client->telephone ?? '' }}</td>
                <td class="label" style="padding-left: 15px; width: 30px;">et</td><td class="ligne-continue" style="width: 30%;"></td>
            </tr>
            <tr>
                <td class="label">Fax :</td><td class="ligne-continue">{{ $contrat->client->fax ?? '' }}</td>
                <td class="label" style="padding-left: 15px;">et</td><td class="ligne-continue"></td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="label" style="width: 90px;">Mobile :</td><td class="ligne-continue" style="width: 30%;">{{ $contrat->client->mobile ?? '' }}</td>
                <td class="label" style="padding-left: 15px; width: 60px;">E.mail :</td><td class="ligne-continue">{{ $contrat->client->email ?? '' }}</td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="label" style="width: 110px;">Code activité :</td>
                <td class="ligne-continue" style="width: 50%;">{{ $contrat->code_activite }}</td>
                <td></td>
            </tr>
        </table>

        <br>

        <table>
            <tr>
                <td class="label" style="width: 100px;">Type TPE :</td>
                <td style="width: 80px;">
                    <span class="checkbox">{{ $contrat->type_tpe == 'GPRS' ? 'X' : '' }}</span> GPRS
                </td>
                <td style="width: 100px;">
                    <span class="checkbox">{{ $contrat->type_tpe == 'Filaire' ? 'X' : '' }}</span> Filaire
                </td>
                <td class="label" style="padding-left: 50px; width: 170px;">Nombre TPE à installer :</td>
                <td style="border: 1px solid #000; text-align: center; width: 40px;">{{ $contrat->nombre_tpe_demandes }}</td>
                <td></td>
            </tr>
        </table>

        <br>

        <table>
            <tr><td class="label" style="width: 170px;">Nom contact principal :</td><td class="ligne-continue">{{ $contrat->nom_contact_principal }}</td></tr>
        </table>

        <table>
            <tr>
                <td class="label" style="width: 130px;">Type du contact :</td>
                <td style="width: 180px;">
                    <span class="checkbox">{{ $contrat->type_contact == 'propriétaire ou gérant' ? 'X' : '' }}</span> propriétaire ou gérant
                </td>
                <td>
                    <span class="checkbox">{{ $contrat->type_contact == 'employé' ? 'X' : '' }}</span> employé
                </td>
            </tr>
        </table>

        <table>
            <tr><td class="label" style="width: 200px;">Titre de travail du contact :</td><td class="ligne-continue">{{ $contrat->titre_travail_contact }}</td></tr>
            <tr><td class="label">Nom contact 2 :</td><td class="ligne-continue">{{ $contrat->nom_contact_2 }}</td></tr>
        </table>

        <br>

        <table>
            <tr>
                <td class="label" style="width: 140px;">N° de compte (RIB) :</td>
                <td class="ligne-continue font-mono" style="letter-spacing: 4px; font-size: 15px;">
                    <strong>{{ $contrat->numero_rib }}</strong>
                </td>
            </tr>
            <tr>
                <td class="label">N° de registre de com :</td>
                <td class="ligne-continue">{{ $contrat->client->registre_commerce ?? '' }}</td>
            </tr>
            <tr>
                <td class="label">N° identifiant fiscal :</td>
                <td class="ligne-continue">{{ $contrat->client->identifiant_fiscal ?? '' }}</td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="label" style="width: 240px;">Nombre d'années du commerce :</td>
                <td class="ligne-continue" style="width: 100px; text-align: center;">{{ $contrat->client->annees_commerce ?? '' }}</td>
                <td></td>
            </tr>
        </table>

    </div>

</body>
</html>