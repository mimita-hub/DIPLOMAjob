<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Entreprise;
use App\Models\Missionstage;
use App\Models\Profilstage;
use App\Models\Metier;
use Auth;
use DB;
class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages=Stage::all();
        $metiers=Metier::all();
        return view('stage.index',compact('stages','metiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $metier=Metier::all();
        return view('stage.create',compact('metier'));
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
        $mission=$request->mission;
        $competence=$request->competence;

        $entreprise=Entreprise::where('user_id',$identreprise)->first();



       $stage= Stage::create([
            'nomstage' => $request->nomstage,
            'nomentreprise' =>$entreprise->nomEntreprise,
            'nommetier' =>$request->metier,
            'secteur_entreprise'=> $entreprise->secteur_entreprise,
            'nombrepost' => $request->nbpost,
            'niveaupost' => $request->nvpost,
            'niveaudétude' => $request->nvetude,
            'lieu' =>  $entreprise->lieu_entreprise,
            'periode' => $request->period,
            'entreprise_id'=>$entreprise->id,

        ]);
        for($i=0;$i< count($mission); $i++){
            $missionstage=Missionstage::create([
                'description'=> $mission[$i],
               ]);
               $missionstage->assignStage($stage);
            }
            for($i=0;$i< count($competence); $i++){
                $profilstage=Profilstage::create([
                    'description'=> $competence[$i],
                   ]);
                   $profilstage->assignStage($stage);
                }

        return redirect()->route('stages.index')
        ->with('success','filiere crée avec succée.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stage=Stage::find($id);

        $stage->delete();

        return redirect()->route('app_listestage')
                      ->with('success','Stage supprimé avec succée.');
    }
    public function search(Request $request )
    {
        if($request->metier && $request->recherchestage  && $request->nvetudere ){
            $stages=DB::table('stages')->where('nommetier','like','%'.$request->metier.'%')
                                       ->where('nomstage','like','%'.$request->recherchestage.'%')
                                       ->where('niveaudétude','=',$request->nvetudere)
                                       ->get();

        }
        $metiers=Metier::all();


        return view('stage.index',compact('stages','metiers'));
}
public function ModifierStage($id){
    $stage=Stage::find($id);
    return view('stage.modifierstage',compact('stage'));

}
public function updatestage(Request $request,$id){
    $stage=Stage::find($id);
    $nommetier=$request->metier;

    $identreprise=Auth::id();
    $entreprise=Entreprise::where('user_id',$identreprise)->first();
    $mission=$request->mission;
    $competence=$request->competence;
    $profilmodifier=$request->profilmodifier;
    $missionmodifier=$request->missionmodifier;
    $updating=DB::table('stages')
    ->where('id',$id)
    ->update([
      'nomstage' => $request->nomstage,
      'nomentreprise' =>$entreprise->nomEntreprise,
      'nommetier' =>$request->metier,
      'nombrepost' => $request->nbpost,
      'niveaupost' => $request->nvpost,

      'niveaudétude' => $request->nvetude,

      'lieu' =>  $entreprise->lieu_entreprise,
      'periode' => $request->période,
      'entreprise_id'=>$entreprise->id,


    ]);

    for($i=0;$i< count($mission); $i++){
        DB::table('missionstages')
         ->where('id',$request->idmission)
         ->update([
             'description'=> $mission[$i],
         ]);

         }

         for($i=0;$i< count($competence); $i++){
            DB::table('profilstages')
             ->where('id',$request->idprofil)
             ->update([
                 'description'=> $competence[$i],
             ]);
             }
             if($missionmodifier!=null){
             for($i=0;$i< count($missionmodifier); $i++){
                $missionstagemodifier=Missionstage::create([
                    'description'=> $missionmodifier[$i],
                   ]);
                   $missionstagemodifier->assignStage($stage);
                }}

                if($profilmodifier!=null){
                for($i=0;$i< count($profilmodifier); $i++){
                    $profilstagemodifier=Profilstage::create([
                        'description'=> $profilmodifier[$i],
                       ]);
                       $profilstagemodifier->assignStage($stage);
                    }}

        return redirect()->route('app_listestage')
        ->with('success','Stage modifié avec succée.');
}
}
