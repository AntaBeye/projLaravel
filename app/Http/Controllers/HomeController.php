<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Sondage;
use App\Models\User;
 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('citoyen.home');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    public function nombreVotes() {
        $nombreTotalVotes = Sondage::count();
        return view('adminHome', ['nombreTotalVotes' => $nombreTotalVotes]);
            }
    
            public function chartData() {
                $candidats = User::where('type', 2)->get();
                // Récupérer les données nécessaires pour le diagramme
                // Par exemple, vous pouvez utiliser des requêtes SQL pour compter le nombre d'avis pour chaque candidat dans chaque catégorie
                $peuSatisfait = Sondage::where('rating', 2)->groupBy('candidat_id')->pluck(\DB::raw('count(*)'));
                $satisfait = Sondage::where('rating', 1)->groupBy('candidat_id')->pluck(\DB::raw('count(*)'));
                $pasSatisfait = Sondage::where('rating', 3)->groupBy('candidat_id')->pluck(\DB::raw('count(*)'));
            
                // Passer les données à la vue
                return view('adminHome', compact('candidats','peuSatisfait', 'satisfait', 'pasSatisfait'));
            }
            
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function candidatHome()
    {
        return view('candidatHome');
    }
}