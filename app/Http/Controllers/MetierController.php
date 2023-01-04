<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metier;
use App\Models\Entreprise;
use App\Models\Competence;
use App\Models\Mission;
use Auth;use App\Models\Elementcompetence;
use DB;



class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('layouts.metier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metier = Metier::create([
            'titre'=> $request->titremetier,
            'description'=>  $request->descriptionmetier,
           ]);


            $description=$request->description;
            $intitule=$request->intitule;
            $element=$request->element;
            $objectif=$request->objectif;
           $niveau=$request->niveau;
           $id=$request->id;
           $idElement=$request->idElement;

           $data=Competence::all();
            $code= 0;
           $last_data=collect($data)->last();

           if($last_data==null){
               $code=1;
           }else{
              $code=$last_data->id+1;
           }

           for($i=0;$i< count($description); $i++){
               $mission= Mission::create([
                   'description'=> $description[$i],
                  ]);
                  $mission->assignMetier($metier);
            for($j=0;$j< count($intitule); $j++){

            if($id[$j]-1==$i){
               $competence= Competence::create([
                   'code'=>"C".(string)$code,
                   'intitule'=> $intitule[$j],
                  ]);
                  $code++;
                  $competence  -> assignMission($mission);

           for($k=0;$k<count($element);$k++){
               if($idElement[$k]-1==$j){
                   Elementcompetence::create([
                       "intitule" =>$element[$k],
                       "code" => $competence->code,
                       "objectif"=>$objectif[$k],
                       "niveau"=>$niveau[$k],
                       "competence_id" =>$competence->id ,
                   ]);
           }

           }
            }
           }
           }




                   $identrep=Auth::id();
                   $entreprise = Entreprise::where('user_id',$identrep)->first();
                    $entreprise-> assignMetier($metier);
               return redirect()->route('app_metier')
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

        $metier=Metier::find($id);

        $metier->delete();


        return redirect()->route('app_listemetier')
                      ->with('success','Métier supprimé avec succée.');
    }
    public function search(Request $request )
    {
        $search=$request->get('cherche');

        $metiers=DB::table('metiers')->where('titre','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->get();

            return view('layouts.metier',compact('metiers'));

    }
    public function ModifierMetier($id){
        $metier=Metier::find($id);
        return view('metiers.modifiermetier',compact('metier'));

    }
    public function updatemetier(Request $request ,$id){
        $metier=Metier::find($id);
        $description=$request->description;
        $idmission=$request->idmission;
        $intitule=$request->intitule;
        $idcompetence=$request->idcompetence;
        $element=$request->element;
        $idelement=$request->idelement;
        $niveau=$request->niveau;
        $objectif=$request->objectif;
        $updating=DB::table('metiers')
        ->where('id',$id)
        ->update([
            'titre'=> $request->titremetier,
            'description'=>  $request->descriptionmetier,
        ]);

        for($i=0;$i<count($description);$i++){

            DB::table('missions')
            ->where('id',$idmission[$i])
            ->update([
                'description'=> $description[$i],
            ]);
          }
          for($i=0;$i<count($intitule);$i++){
            DB::table('competences')
            ->where('id',$idcompetence[$i])
            ->update([
                'intitule'=> $intitule[$i],
            ]);
          }
          for($i=0;$i<count($element);$i++){
            DB::table('elementcompetences')
            ->where('id',$idelement[$i])
            ->update([
                "intitule" =>$element[$i],
                "objectif"=>$objectif[$i],
                "niveau"=>$niveau[$i],

            ]);
          }
        return redirect()->route('app_listemetier')
        ->with('success',' modifié avec succée.');
    }
}
