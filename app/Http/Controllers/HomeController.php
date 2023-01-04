<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Universite;
use App\Models\Entreprise;
use App\Models\Formation;
use App\Models\Specialite;
use App\Models\Module;
use App\Models\Faculte;
use App\Models\Departement;
use App\Models\Metier;
use App\Models\Competence;
use App\Models\ElementCompetence;
use App\Models\Feedback;
use App\Models\Emploi;
use App\Models\Stage;
use App\Models\Semestre;
use Auth;
use DB;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index()
    {
        return view('home.home');
    }*/
    public function home()
    {
        $univ=Universite::all();
        $metier=Metier::all();
        $specialite=Specialite::all();
        $id=$specialite->pluck('id')->first();
        $feeds=Feedback::where('specialite_id',$id);
        $feed=$feeds->count('commentaire');


        return view('home.home',compact('univ','metier','specialite','feeds','feed'));
    }

    public function  afficherstage($id1,$id2){
        $stage=Stage::find($id1);
        $entreprise=Entreprise::find($id2);
        return view('stage.affichestage',compact('stage','entreprise'));
    }
    // la page about.blade.php
    public function about()
    {
        $newAbout= new About();
        $newAbout->name='taous';
        $newAbout->save();
        $abouts=About::all();
        //dd($newAbout);

       return view('home.about',['abouts'=> $abouts]);
    }

    // la page formation.blade.php
    public function formation()
    { $formation=Specialite::all();


        return view('layouts.formation',compact('formation'));
    }
    public function DetailsFormation($id)
    {
        $data=Specialite::find($id);
     $semestre=Semestre::all()->sortBy('code');
       $module=Module::all();
        return view("layouts.detailsFormation",compact('data','module','semestre'));
    }

    public function pdf( $id )
    {
        $data=Specialite::find($id);
     $semestre=Semestre::all()->sortBy('code');
      $module=Module::all();
        // L'instance PDF avec une vue : resources/views/posts/show.blade.php
        $pdf = PDF::loadView('moduls.pdf',['data' => $data,'module'=>$module,'semestre'=>$semestre])->setOptions(['defaultFont' => 'sans-serif']);



        //$pdf = PDF::loadView('moduls.pdf',compact('data','module'));
        return $pdf->download($data->nomSpecialite.'.pdf');
    }
    public function  affichepdf($cv){

        $path=public_path("storage/cv/$cv");
        return response()->file($path);
    }

    public function DetailsElement($id)
    {
        $element=ElementCompetence::find($id);
        foreach ($element->competence->missions as $mission){
        foreach ($mission->metiers as  $metier){

    foreach ($metier->specialites as $dataF){
        $data=$dataF;
    }}
}


return view("layouts.elementDetails",compact('element','data','metier'));

}








    // la page metier.blade.php
    public function metier()
    {
        $metiers=Metier::all();
        return view('layouts.metier',compact('metiers'));
    }
    // Choix d'inscription
    public function choix()
    {
        return view('layouts.choix');
    }

    public function  listecandidature(){
        $identrep=Auth::id();
        $entreprise = Entreprise::where('user_id',$identrep)->first();

        return view("offre.candidature",compact('entreprise'));
    }
    // la page competence.blade.php
    public function competence()

    { $competences=DB::table('competences')->orderBy('id')->paginate(5);
        $comp=DB::table('competences');
        $elements=DB::table('elementcompetences')->orderBy('id')->paginate(8);

        return view('layouts.competence',compact('competences','elements'));
    }

    public function  entrepriseaffichage($id){
        $entreprise=Entreprise::find($id);
        return view('offre.afficherentreprise',compact('entreprise'));
    }

    public function detail($id)

    {
        $metier=Metier::find($id);
        return view('metiers.detail',compact('metier'));
    }

    public function    listestage(){
        $identrep=Auth::id();
        $entreprise = Entreprise::where('user_id',$identrep)->first();

        return view("stage.listestage",compact('entreprise'));
    }
    public function    listemetier(){
        $identrep=Auth::id();
        $entreprise = Entreprise::where('user_id',$identrep)->first();
        return view("metiers.listemetier",compact('entreprise'));
    }
    public function    listeemploi(){
        $identrep=Auth::id();
        $entreprise = Entreprise::where('user_id',$identrep)->first();

        return view("offre.listeemploi",compact('entreprise'));
    }

    // la page competence.blade.php
    public function ElementCompetence()

    {
        return view('layouts.elementCompetence');
    }



    // la page competence.blade.php
    public function FamilleCompetence()
    {
        return view('layouts.familleCompetence');
    }

    public function afficheremploi($id1,$id2){
        $emploi=Emploi::find($id1);
        $entreprise=Entreprise::find($id2);
        return view('offre.afficheremploi',compact('emploi','entreprise'));
    }

    // la page competence.blade.php
    public function bigdata()
    {
        return view('formations.bigdata');
    }
    public function NvForm()
    {
        return view('formations.nouvelleForm');
    }
    public function entreprise()
    {
        $entreprises=Entreprise::all();
        return view('layouts.entreprise',compact('entreprises'));
    }
    public function  registermetier(){
        return view('metiers.createmetier');
    }
   public function detailsmetier($id){
    $met=Metier::find($id);
    return view('metiers.developpeurweb',compact('met'));
   }

   public function dash(){
    $id=Auth::id();
    $specialite=Specialite::where('user_id',$id)->get();
    $nomSpecialite=$specialite->pluck('nomSpecialite')->first();
    $idSpec=$specialite->pluck('id')->first();
    $feed=Feedback::where('specialite_id',$idSpec)->count('id');
    $module=Module::where('user_id',$id)->count('id');
    $univ =Universite::where('user_id',$id)->get();
    $idUniv=$univ->pluck('id')->first();
    $facultes=Faculte::where('universite_id',$idUniv)->get();

    $fac=Faculte::where('universite_id',$idUniv)->count('id');
    $idfac=$facultes->pluck('id')->first();
    $depart=Departement::where('faculte_id',$idfac)->count('id');
         /************ Entreprise *////
         $userData = Feedback::select(DB::raw("COUNT(*) as count"))
         ->whereYear('created_at', date('Y'))
         ->Where('specialite_id',$idSpec)
         ->groupBy(DB::raw("Month(created_at)"))
         ->pluck('count');
if(Auth::user()->type=="responsable_rh")
{    $id=Auth::id();
    $entreprise=Entreprise::where('user_id',$id)->first();
  $metier=$entreprise->metiers()->count('id');
 $offre=Emploi::where('entreprise_id',$entreprise->id)->count('id');
    return view('adminDash.dash',compact( 'metier','offre'));

}
    return view('adminDash.dash',compact( 'module','feed','fac','depart','userData','nomSpecialite'));
   }





   public function entrepriseFeed()
   {

        $identrep=Auth::id();
        $feedbacks = Feedback::where('user_id',$identrep)->get();

        return view("feedbacks.entreprise",compact('feedbacks')) ;


   }


   public  function entreprisedash(){
    $identrep=Auth::id();
    $entreprise = Entreprise::where('user_id',$identrep)->first();
    return  view("metiers.entreprise",compact('entreprise')) ;

   }
   public function etudiantFeed()
   {

        $idetudiant=Auth::id();
        $feedbacks = Feedback::where('user_id',$idetudiant)->get();

        return view("feedbacks.etudiant",compact('feedbacks')) ;


   }

}
