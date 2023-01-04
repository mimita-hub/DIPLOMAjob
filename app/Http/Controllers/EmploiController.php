<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use Illuminate\Http\Request;
use App\Models\Metier;
use App\Models\Entreprise;
use App\Models\Missionemploi;
use App\Models\Competenceemploi;
use Auth;
use DB;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->metier && $request->rechercheemploi && $request->nvpostrecherche  && $request->nvetudere  &&  $request->experiencere){
            $data=DB::table('emplois')->where('nommetier','like','%'.$request->metier.'%')
                                       ->where('nompost','like','%'.$request->rechercheemploi.'%')
                                       ->where('niveaupost','=',$request->nvpostrecherche)
                                       ->where('niveaudétude','=',$request->nvetudere)
                                       ->where('experiencedemandée','=',$request->experiencere)
                                       ->get();

        }

        else{
            $data=Emploi::all();
        }

      $metiers=Metier::all();


       return view('offre.index',compact('data','metiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $metier=Metier::all();

    return view('offre.create',compact('metier'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $identreprise=Auth::id();

        $entreprise=Entreprise::where('user_id',$identreprise)->first();
        $mission=$request->mission;
        $competence=$request->competence;
        $nommetier=$request->metier;




       $offreemploi= Emploi::create([
            'nompost' => $request->nompost,
            'nomentreprise' =>$entreprise->nomEntreprise,
            'nommetier' =>$request->metier,
            'secteur_entreprise'=> $entreprise->secteur_entreprise,
            'nombrepost' => $request->nbpost,
            'niveaupost' => $request->nvpost,
            'experiencedemandée' => $request->experience,
            'niveaudétude' => $request->nvetude,
            'typecontrat' => $request->contrat,
            'lieu' =>  $entreprise->lieu_entreprise,
            'datedexpiration' => $request->date,
            'entreprise_id'=>$entreprise->id,

        ]);
        for($i=0;$i< count($mission); $i++){
            $missionemploi=Missionemploi::create([
                'description'=> $mission[$i],
               ]);
               $missionemploi->assignEmploi($offreemploi);
            }
            for($i=0;$i< count($competence); $i++){
                $competenceemploi= Competenceemploi::create([
                    'description'=> $competence[$i],
                   ]);
                   $competenceemploi->assignEmploi($offreemploi);

                }
        return redirect()->route('offre.index')
        ->with('success','filiere crée avec succée.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function show(Emploi $emploi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function edit(Emploi $emploi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emploi $emploi)
    {

     return view('offre.modifieremploi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $emploi=Emploi::find($id);

        $emploi->delete();

        return redirect()->route('app_listeemploi')
                      ->with('success','Emploi supprimé avec succée.');
    }
    public function ModifierEmploi($id){
        $emploi=Emploi::find($id);
        return view('offre.modifieremploi',compact('emploi'));

    }
    public function  updateemploi(Request $request,$id){
        $emploi=Emploi::find($id);
        $nommetier=$request->metier;

        $identreprise=Auth::id();
        $entreprise=Entreprise::where('user_id',$identreprise)->first();
        $mission=$request->mission;
        $competence=$request->competence;
        $missionmodifier=$request->missionmodifier;
        $competencemodifier=$request->competencemodifier;

     $updating=DB::table('emplois')
              ->where('id',$id)
              ->update([
                'nompost' => $request->nompost,
                'nomentreprise' =>$entreprise->nomEntreprise,
                'nommetier' =>$request->metier,

                'nombrepost' => $request->nbpost,
                'niveaupost' => $request->nvpost,
                'experiencedemandée' => $request->experience,
                'niveaudétude' => $request->nvetude,
                'typecontrat' => $request->contrat,
                'lieu' =>  $entreprise->lieu_entreprise,
                'datedexpiration' => $request->date,
                'entreprise_id'=>$entreprise->id,

              ]);
              for($i=0;$i< count($mission); $i++){
               DB::table('missionemplois')
                ->where('id',$request->idmission)
                ->update([
                    'description'=> $mission[$i],
                ]);
                }
                for($i=0;$i< count($competence); $i++){
                    DB::table('competenceemplois')
                    ->where('id',$request->idcompetence)
                    ->update([
                        'description'=> $competence[$i],
                    ]);
                    }
                    if($missionmodifier!=null){
                    for($i=0;$i< count($missionmodifier); $i++){
                        $missionemploi=Missionemploi::create([
                            'description'=> $missionmodifier[$i],
                           ]);
                           $missionemploi->assignEmploi($emploi);
                        }}
                         if($competencemodifier!=null){
                        for($i=0;$i< count($competencemodifier); $i++){
                            $competenceemploi= Competenceemploi::create([
                                'description'=> $competencemodifier[$i],
                               ]);

                               $competenceemploi->assignEmploi($emploi);
                            }}

                            return redirect()->route('app_listeemploi')
                            ->with('success','Emploi modifié avec succée.');
    }
}
