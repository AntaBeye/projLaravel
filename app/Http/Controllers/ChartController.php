<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sondage;
use App\Models\User;

class ChartController extends Controller
{
    public function getDataForChart()
    {
        $candidats = User::where('type', 2)->get(); 
            // Récupérer les données
            $data = Sondage::select('programme_politique_id', 'rating')
                ->get();

        // Transformer les données
        $result = [];
        foreach ($data as $vote) {
            $candidat = $vote->candidat->name; // Supposons que le nom du candidat est accessible via une relation
            $ratingText = $vote->getRatingTextAttribute(); // Méthode pour obtenir le texte correspondant à la note (peu satisfait, satisfait, etc.)
            if (!isset($result[$candidat][$ratingText])) {
                $result[$candidat][$ratingText] = 1;
            } else {
                $result[$candidat][$ratingText]++;
            }
        }

        return response()->json($result);
    }

}
