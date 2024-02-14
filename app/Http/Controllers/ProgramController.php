<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sondage;
class ProgramController extends Controller
{
    public function programPol()
    {
        $candidats = User::where('type', 2)->get(); 
        $nombreAvisParProgramme = DB::table('sondages')
        ->select('programme_politique_id', DB::raw('COUNT(rating) as total_rating'))
        ->groupBy('programme_politique_id')
        ->get();    
        // dd($candidats, $nombreAvisParProgramme);
        return view('programPol',compact('candidats','nombreAvisParProgramme'));
    }
}
