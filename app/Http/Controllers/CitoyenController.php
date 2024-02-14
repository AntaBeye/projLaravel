<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class CitoyenController extends Controller
{
    public function listeCitoyen()
    {
        $citoyens = User::where('type', 0)->get(); 

        return view('listeCitoyen',compact('citoyens'));
    }
    public function nombreCitoyens() {
        $nombreCitoyens = User::where('type', 0)->count();
    
        return view('adminHome')->with('nombreCitoyens', $nombreCitoyens);
    }
}
