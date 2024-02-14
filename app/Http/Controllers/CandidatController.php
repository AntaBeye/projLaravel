<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use App\Models\User;
class CandidatController extends Controller
{
    public function listeCandidat()
    {
        $candidats = User::where('type', 2)->get(); 

        return view('listeCandidat', compact('candidats'));
    }
    // public function index()
    // {
    //     $candidats = User::where('type', 2)->get();  // Assurez-vous d'ajuster la logique pour récupérer les candidats selon vos besoins
    //     return view('citoyen.sondage', compact('candidats'));
    // }
    public function candidatListe()
    {
        $candidats = User::where('type', 2)->get(); 

        return view('citoyen.candidatListe', compact('candidats'));
    }

    public function nombreCandidats() {
        $nombreCandidats = User::where('type', 2)->count();
    
        return view('adminHome')->with('nombreCandidats', $nombreCandidats);
    }

    public function modifierCandidat($id) {
        // Récupérez le candidat à modifier
        $candidat = User::find($id);

        // Vous pouvez maintenant effectuer des actions sur le candidat
        // Par exemple, passer le candidat à une vue de modification
        return view('modifier-candidat', ['candidat' => $candidat]);
    }

    public function supprimerCandidat($id) {
        // Récupérez le candidat à supprimer
        $candidat = User::find($id);

        // Supprimez le candidat
        $candidat->delete();

        // Vous pouvez rediriger l'utilisateur ou afficher une vue de confirmation
        return redirect()->route('listeCandidat')->with('success', 'Candidat supprimé avec succès');
    }
    // CandidatController.php

    public function sauvegarderModificationCandidat(Request $request, $id) {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'parti' => 'required|string|max:255',
            'programme_politique' => 'required|string',
        ]);
    
        // Récupérez le candidat à modifier
        $candidat = User::find($id);
    
        // Mettez à jour les champs du candidat avec les nouvelles données du formulaire
        $candidat->name = $request->input('name');
        $candidat->parti = $request->input('parti');
        $candidat->programme_politique = $request->input('programme_politique');
        
        // Sauvegardez les modifications
        $candidat->save();
    
        // Redirigez l'utilisateur ou affichez une vue de confirmation
        return redirect()->route('programPol')->with('success', 'Candidat modifié avec succès');
    }

    // CandidatController.php

public function afficherFormulaireAjout() {
    return view('ajouter-candidat');
}

// CandidatController.php

public function sauvegarderAjoutCandidat(Request $request) {
    // Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'parti' => 'required|string|max:255',
        'programme_politique' => 'required|string',
    ]);

    // Création d'un nouveau candidat
    $nouveauCandidat = new User();
    $nouveauCandidat->name = $request->input('name');
    $nouveauCandidat->parti = $request->input('parti');
    $nouveauCandidat->programme_politique = $request->input('programme_politique');
    $nouveauCandidat->type = 2; // Assurez-vous de définir le type correct

    // Génération de l'e-mail à partir du nom du candidat
    $nouveauCandidat->email = strtolower(str_replace(' ', '', $request->input('name'))) . '@gmail.com';

    // Génération d'un mot de passe par défaut (vous pouvez personnaliser selon vos besoins)
    $motDePasseParDefaut = 'passer123';
    $nouveauCandidat->password = Hash::make($motDePasseParDefaut);

    // Sauvegarde du nouveau candidat
    $nouveauCandidat->save();

    // Redirection vers la liste des candidats ou une vue de confirmation
    return redirect()->route('programPol')->with('success', 'Candidat ajouté avec succès');
}

    

}
