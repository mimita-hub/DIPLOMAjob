<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use App\Models\Metier;
use App\Models\Faculte;
use App\Models\Departement;
use Auth;
use DB;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $id=Auth::id();
       $data=DB::select("select * from specialites where user_id ='$id'");
       $metier=Metier::all();



       return view('specialites.index',compact('data','metier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $id=Auth::id();

        //$user=Filiere::find($id);
        $filiere=Filiere::where('user_id',$id)->get();


        return view('specialites.create',compact('filiere'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $id=Auth::id();
        //$filiere = Filiere::where('user_id',$id);
        //$filiere=Filiere::find( $Userfiliere);
        $request->validate(
            [ 'code',
            'nom',
          'description',
          ]);
         $formation=Specialite::create([
            'code' => $request->code,
            'nom' => $request->nom,
            'description' => $request->description,
            'filiere_id' => $request->filiere_id,

        ]);
        alert()->success('Ajoutée','Specialité Ajoutée  avec succés')->showConfirmButton('ok', 'blue');

        return redirect()->route('specialites.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialite  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Specialite $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialite  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialite $specialite)

    {
        $metier=Metier::all();
        $metierOld=Specialite::find($specialite->id)->metiers;
        $TitreMetier=$metierOld->pluck('titre')->first();

        return view('specialites.edit',compact('specialite','metier','TitreMetier'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialite  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialite $specialite)
    {
        $request->validate([

        'nomSpecialite',
        'description',
        'objectifs',
        'prerequis',
        'secteurs',
        ]);
        /// Old metier
      $metierOld=Specialite::find($specialite->id)->metiers;
      $metierIdOld=$metierOld->pluck('id');
      $specialite->metiers()->detach($metierIdOld);
// nouveau metier
      $metierNV=$request['metier'];
      $metier=Metier::where('titre',$metierNV);
      $metierNvId=$metier->pluck('id');
    $specialite->metiers()->attach($metierNvId);
    $specialite->update($request->all());
        alert()->success('Modifié','Specialité Modifiée  avec succés')->showConfirmButton('ok', 'blue');

        return redirect()->route('specialites.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialite  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialite $formation)
    {


        //
    }
    public function search(Request $request )
    {
        $search=$request->get('search');
      //  $formation=DB::table('specialites')->where('nomSpecialite','like','%'.$search.'%')->paginate(5);
        return view('layouts.formation',compact('formation'));
    }
   public function metiersSpec()
   {
    $metiers=Metier::all();
    return view('specialites.metierSpec',compact('metiers'));
   }
   public function detailsMetSpec($id)
   {
    $metiers=Metier::find($id);
    return view('specialites.detailsMetSpec',compact('metiers'));
   }
   public function liste()
   {
        $id=Auth::id();
        $univ=DB::select("select *from universites where user_id='$id'");
        $fac=Faculte::where('user_id',$id)->first();
        $dep=Departement::where('user_id',$id)->first();
    if (Auth::user()->type=="univAdmin")
        {

            $data=Specialite::all();

            return view('specialites.liste',compact('data','univ'));
        }
        elseif(Auth::user()->type=="respFaculte")
        {
            $data=Specialite::all();

            return view('specialites.liste',compact('data','univ','fac'));
        }
        elseif(Auth::user()->type=="respDepartement")
        {
            $data=Specialite::all();

            return view('specialites.liste',compact('data','univ','dep'));
        }

   }



}

