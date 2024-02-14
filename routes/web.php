<?php
 
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\SondageController;
use App\Http\Controllers\ChartController;

 
Route::get('/', function () {
    return view('welcome');
});

 
Auth::routes();
   
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:candidat'])->group(function () {
   
    Route::get('/candidat/home', [HomeController::class, 'candidatHome'])->name('candidat.home');
});

Route::get('/listeCitoyen', [CitoyenController::class, 'listeCitoyen'])->name('listeCitoyen');
Route::get('/listeCandidat', [CandidatController::class, 'listeCandidat'])->name('listeCandidat');
Route::get('/candidatListe', [CandidatController::class, 'candidatListe'])->name('candidatListe');

Route::get('/programPol', [ProgramController::class, 'programPol'])->name('programPol');
Route::get('/sondage', [SondageController::class, 'sondage'])->name('sondage');



Route::get('/modifier-candidat/{id}', [CandidatController::class, 'modifierCandidat'])->name('modifierCandidat');
Route::get('/supprimer-candidat/{id}', [CandidatController::class, 'supprimerCandidat'])->name('supprimerCandidat');
Route::post('/sauvegarder-modification-candidat/{id}', [CandidatController::class, 'sauvegarderModificationCandidat'])->name('sauvegarderModificationCandidat');

Route::get('/ajouter-candidat', [CandidatController::class, 'afficherFormulaireAjout'])->name('afficherFormulaireAjout');
Route::post('/sauvegarder-ajout-candidat', [CandidatController::class, 'sauvegarderAjoutCandidat'])->name('sauvegarderAjoutCandidat');

Route::get('/admin/home', [CitoyenController::class, 'nombreCitoyens'])->name('admin.home');
Route::get('/admin/home/candidats', [CandidatController::class, 'nombreCandidats'])->name('admin.home.candidats');
Route::get('/admin/home/votes', [HomeController::class,'nombreVotes'])->name('admin.home.votes');

// Route::post('/sondages/store', [SondageController::class, 'store'])->name('sondages.store');
// Route::get('/citoyensondage', [SondageController::class, 'citoyen.sondage'])->name('citoyen.sondage');

// Route::get('/sondage', [SondageController::class, 'index'])->name('sondages.index');
// Route::get('/sondage/{id}', 'SondageController@index')->name('citoyen.sondage');

// Route pour afficher la liste des candidats avec le formulaire de sondage
Route::get('/sondage', [SondageController::class, 'index'])->name('sondages.index');

// Route pour soumettre le formulaire de sondage
Route::post('/sondages/store', [SondageController::class, 'store'])->name('sondages.store');

// Route pour afficher le formulaire de sondage pour un citoyen spécifique
Route::post('/citoyen/sondages', [SondageController::class, 'citoyenSondage'])->name('citoyen.sondage');

Route::get('/adminSondage', [SondageController::class, 'adminSondage'])->name('adminSondagePage');
Route::get('/admin/sondage', [SondageController::class, 'adminIndex'])->name('adminSondage');


Route::get('/api/data-for-chart', [ChartController::class, 'getDataForChart']);


