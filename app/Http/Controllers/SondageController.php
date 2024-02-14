<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sondage;


class SondageController extends Controller
{
    public function sondage()
    {
        
        return view('citoyen.sondage');
    }
    public function adminSondage()
    {
        
        return view('adminSondage');
    }
    
    public function index()
    {
        $candidats = User::where('type', 2)->with('sondages')->get(); 
        
        return view('citoyen.sondage', compact('candidats'));
        
    } 
    public function adminIndex()
{
    $candidats = User::where('type', 2)->with('sondages')->get(); 

    return view('adminSondage', compact('candidats'));
}

    public function store(Request $request)
    {
        
        $request->validate([
            'programme_politique_id' => 'required',
            'rating' => 'required|in:1,2,3', // Ajoutez d'autres règles de validation si nécessaire
        ]);
        // Validation des données du formulaire
        Sondage::create([
            'user_id' => auth()->id(),
            'programme_politique_id' => $request->programme_politique_id,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Votre vote a été enregistré avec succès.');
    }
    }

