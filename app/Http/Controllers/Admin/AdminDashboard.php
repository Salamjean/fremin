<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LivraisonsExport;
use App\Http\Controllers\Controller;
use App\Models\Deces;
use App\Models\Mairie;
use App\Models\Mariage;
use App\Models\Naissance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AdminDashboard extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function downloadRapport(Request $request)
    {
        $request->validate([
            'annee' => 'required|integer|min:2020|max:' . date('Y'),
            'mois' => 'required|string|size:2',
            'type_rapport' => 'required|in:excel,pdf'
        ]);

        $annee = $request->annee;
        $mois = $request->mois;
        $typeRapport = $request->type_rapport;

        // Récupérer les données des livraisons pour le mois et l'année sélectionnés
        $modelMap = [
            'Naissance' => 'App\\Models\\Naissance',
            'Deces' => 'App\\Models\\Deces',
            'Mariage' => 'App\\Models\\Mariage'
        ];

        $livraisons = collect();

        foreach ($modelMap as $modelName => $modelClass) {
            $modelLivraisons = $modelClass::where('statut_livraison', 'livré')
                ->where('choix_option', 'livraison')
                ->whereYear('updated_at', $annee)
                ->whereMonth('updated_at', $mois)
                ->with('user')
                ->get()
                ->map(function ($item) use ($modelName) {
                    $item->type_document = $modelName;
                    return $item;
                });

            $livraisons = $livraisons->merge($modelLivraisons);
        }

        $data = [
            'livraisons' => $livraisons,
            'annee' => $annee,
            'mois' => $mois,
            'mois_nom' => $this->getMonthName($mois),
            'total_montant' => $livraisons->sum('montant_livraison'),
            'total_livraisons' => $livraisons->count()
        ];

        if ($typeRapport === 'excel') {
            return Excel::download(new LivraisonsExport($data), "rapport_livraisons_{$mois}_{$annee}.xlsx");
        } else {
            $pdf = PDF::loadView('admin.rapports.livraisons-pdf', $data);
            return $pdf->download("rapport_livraisons_{$mois}_{$annee}.pdf");
        }
    }

    private function getMonthName($monthNumber)
    {
        $months = [
            '01' => 'Janvier',
            '02' => 'Février',
            '03' => 'Mars',
            '04' => 'Avril',
            '05' => 'Mai',
            '06' => 'Juin',
            '07' => 'Juillet',
            '08' => 'Août',
            '09' => 'Septembre',
            '10' => 'Octobre',
            '11' => 'Novembre',
            '12' => 'Décembre'
        ];

        return $months[$monthNumber] ?? 'Mois inconnu';
    }
}
