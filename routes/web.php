<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController ;


use App\Http\Controllers\SpecialiteController ;
use App\Http\Controllers\formationController ;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UniversiteController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\MembereController;
use App\Http\Controllers\FaculteController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MetierController;
use App\Http\Controllers\RemarqueController;
use App\Http\Controllers\PrerequiController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\PostulestageController;
use App\Http\Controllers\PostuleController;
use App\Http\Controllers\EntrepriseController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/resultat', [SemestreController::class,'resultat'])->name('resultat');

Route::get('/metiersSpec', [SpecialiteController::class,'metiersSpec'])->name('metiersSpec');
Route::get('/liste', [SpecialiteController::class,'liste'])->name('liste');


Route::get('/detailsMetSpec/{id}', [SpecialiteController::class,'detailsMetSpec'])->name('detailsMetSpec');

Route::get('/pdf/{id}', [HomeController::class,'pdf'])->name('pdf');
Route::get('/pdfRapport', [RemarqueController::class,'pdfRapport'])->name('pdfRapport');

Route::get('/pdfdash/{id}', [ModuleController::class,'pdfdash'])->name('pdfdash');
Route::get('/listestage', [HomeController::class,'listestage'])->name('app_listestage');
Route::get('/listecandidature', [HomeController::class,'listecandidature'])->name('app_listecandidature');
Route::get('/listemetier', [HomeController::class,'listemetier'])->name('app_listemetier');
Route::get('/listeemploi', [HomeController::class,'listeemploi'])->name('app_listeemploi');
Route::get('/modifieremploi/{id}', [EmploiController::class,'ModifierEmploi'])->name('ModifierEmploi');
Route::post('/updateemploi/{id}',[EmploiController::class,'updateemploi'])->name('Updateemploi');

Route::get('/modifierstage/{id}', [StageController::class,'ModifierStage'])->name('ModifierStage');
Route::post('/updatestage/{id}',[StageController::class,'updatestage'])->name('Updatestage');

Route::get('/modifiermetier/{id}', [MetierController::class,'ModifierMetier'])->name('ModifierMetier');
Route::post('/updatemetier/{id}',[MetierController::class,'updatemetier'])->name('UpdateMetier');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

//:::::::::::::::::: Resources :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::resource('User',UserController::class);

Route::resource('Universite',UniversiteController::class);
Route::resource('formations',FormationController::class);
Route::resource('Competence',CompetenceController::class);
Route::resource('specialites',SpecialiteController::class);
Route::resource('membres',MembereController::class);
Route::resource('facultes',FaculteController::class);
Route::resource('departement',DepartementController::class);
Route::resource('moduls',ModuleController::class);
Route::resource('feedbacks' ,FeedbackController::class);
Route::resource('remarques' ,RemarqueController::class);
Route::resource('metiers' ,MetierController::class);
Route::resource('prerequis',PrerequiController::class);
Route::resource('semestres',SemestreController::class);
Route::resource('offre' ,EmploiController::class);
Route::resource('stages' ,StageController::class);
Auth::routes();

Route::get('prerequis/create/{id}' ,[PrerequiController::class,'create'])->name('create_prerequis');
Route::post('prerequis/store/{id}' ,[PrerequiController::class,'store'])->name('store_prerequis');
Route::get('step2' ,[SemestreController::class,'createStep2'])->name('semestres.create.step2');
Route::get('semestre' ,[SemestreController::class,'afficher'])->name('semestres.afficher');

// Entreprise::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/entrepriseaffichage/{id}', [HomeController::class, 'entrepriseaffichage'])->name('app_entrepriseaffichage');
Route::get('/entrepriseFeed', [HomeController::class, 'entrepriseFeed'])->name('entrepriseFeed');
Route::get('/serachEntreprise', [EntrepriseController::class,'search'])->name('entreprise_search');
Route::get('/Entreprise', [HomeController::class,'entreprisedash'])->name('entreprise_dash');
Route::delete('/supprimefeed/{id}', [EntrepriseController::class,'supprimefeed'])->name('entreprise_feed');


// Etudiant::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/etudiantFeed', [HomeController::class, 'etudiantFeed'])->name('etudiantFeed');

// Users::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/profil/{id}', [UserController::class,'profil'])->name('profil');
Route::get('/modifierprofil/{user}', [UserController::class,'ModifierProfil'])->name('ModifierProfil');
Route::put('/updateprofil',[UserController::class,'updateProfil'])->name('UpdateProfil');

//Emploi:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/afficheremploi/{id1}/{id2}', [HomeController::class, 'afficheremploi'])->name('app_afficheremploi');

//Metier:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/serachMetier', [MetierController::class,'search'])->name('metier_search');
Route::get('/detailMetier/{id}',[HomeController::class,'detail'])->name('app_detail');

//Stage:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/serachstage', [StageController::class,'search'])->name('stage_search');
Route::get('/afficherstage/{id1}/{id2}', [HomeController::class, 'afficherstage'])->name('app_afficherstage');

//postuler:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::post('postules/store/{id}',[PostuleController::class,'store'])->name('postuler_store');
Route::post('postulestage/store/{id}',[PostulestageController::class,'store'])->name('postulestage_store');
// feedbacks :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('feedbacks/create/{id}' ,[FeedbackController::class,'create'])->name('create_feed');

Route::post('feedbacks/store/{id}' ,[FeedbackController::class,'store'])->name('store_feed');

// remarque::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('remarques/create/{id}' ,[RemarqueController::class,'create'])->name('create_remarque');
Route::post('remarques/store/{id}' ,[RemarqueController::class,'store'])->name('store_remarque');
Route::get('rapport' ,[RemarqueController::class,'rapport'])->name('rapport');

 // membre:::::::::::::::::::::::::::::::::::::///////////////////////////////////////////////////////////////////
   Route::get('membres/create/{id}',[MembereController::class,'create'])->name('membres_create');
   Route::post('membres/store/{id}',[MembereController::class,'store'])->name('membres_store');
   Route::get('membres/profil/{id}',[MembereController::class,'profil'])->name('membres_profil');
   Route::get('membres/import/{id}',[MembereController::class,'import'])->name('membres_import');
   Route::post('membres/Storeimport/{id}',[MembereController::class,'importStore'])->name('membres_importStore');

        // Formation::::::::::::::::::///////////////////////////////////////////////////////////////////////////////
Route::get('/serachFormation', [FormationController::class,'search'])->name('formation_search');

       //Competence::::::::::::::::::::://
Route::get('/competence', [HomeController::class,'competence'])->name('app_competence');
Route::get('/serachCompetence', [CompetenceController::class,'search'])->name('competence_search');

       /////////////// modules index //////////////////////////////////////////////////////////////////////////////////
Route::get('/searchModule', [ModuleController::class,'search'])->name('Module_search');

Route::get('/formation_Module', [ModuleController::class,'AfficherTous'])->name('formation_module');
Route::get('moduls/create/{id}',[ModuleController::class,'create'])->name('moduls_create');
Route::post('moduls/store/{id}',[ModuleController::class,'store'])->name('moduls_store');
Route::get('/validerFormation', [ModuleController::class,'ValiderFormation'])->name('validerFormation');
Route::get('/detailsModule', [ModuleController::class,'detailsModule'])->name('detailsModule');
Route::get('/searchModule', [ModuleController::class,'searchModule'])->name('search_module');


//////////////////////Homeeeeeeeeeeeeee  /////////////////////////////////////////////////////////////////////////////

Route::get('/', [HomeController::class ,'home'])->name('app_home');
Route::get('/formation', [HomeController::class,'formation'])->name('app_formation');
Route::get('/NvForm', [HomeController::class,'NvForm'])->name('app_NVformation');
Route::get('/entreprise', [HomeController::class,'entreprise'])->name('app_entreprise');
Route::get('/detailsFormation/{id}', [HomeController::class,'DetailsFormation'])->name('formation_details');
Route::get('/elementDetails/{id}', [HomeController::class,'DetailsElement'])->name('element_details');
Route::get('/elementCompetence', [HomeController::class,'ElementCompetence'])->name('app_Ecompetence');
Route::get('/familleCompetence', [HomeController::class,'FamilleCompetence'])->name('app_Fcompetence');
Route::get('/metier', [HomeController::class, 'metier'])->name('app_metier');
Route::get('/registermetier', [HomeController::class, 'registermetier'])->name('app_registermetier');
Route::get('/bigdata', [HomeController::class, 'bigdata'])->name('app_bigdata');
Route::get('/about', [HomeController::class,'about'])->name('app_about');
Route::get('/dash', [HomeController::class,'dash'])->name('dash');

Route::get('/affichepdf/{cv}', [HomeController::class,'affichepdf'])->name('app_pdf');

//////:::::::::::::::::::universite ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::/
Route::get('/serachUniv', [UniversiteController::class,'search'])->name('User_search');


// ::::::::::: route function :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::/


//////////////

Route::get('choix', function () {
    return view('layouts.choix');
})->name('choix');
///////////////
Route::get('index', function () {
    return view('index');
})->name('index');
//////////
Route::get('registerUNIV', function () {
    return view('auth.registerU');
})->name('registerUNIV');
/////////
Route::get('registerETD', function () {
    return view('auth.registerETD');
})->name('registerETD');
/////////
Route::get('registerADMIN', function () {
    return view('auth.registerADMIN');
})->name('registerADMIN');
/*Route::get('commenter', function () {
    return view('layouts.commenter');
})->name('commenter');
*/
