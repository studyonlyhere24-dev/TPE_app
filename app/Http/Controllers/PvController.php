<?php

namespace App\Http\Controllers;

use App\Models\ContratActivite;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PvController extends Controller
{
    public function genererPDF($id)
    {
        $contrat = ContratActivite::with('client')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.pv', compact('contrat'));
        return $pdf->stream('PV_Installation_' . $contrat->numero_contrat . '.pdf');
    }
}