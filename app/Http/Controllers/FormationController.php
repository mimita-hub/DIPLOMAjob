<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Faculte;
use App\Models\User;
use App\Models\Departement;
use App\Models\Module;
use App\Models\Universite;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Auth;
use DB;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //$id=Auth::id();
       // $filiere=Filiere::find('user_id',$id);
       // $univ=Universite::where('user_id',$id);
       // $data=Formation::where('filiere_id',$filiere->filiere);
       $data=Formation::all();
       return view('formations.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $id=Auth::id();

        //$user=Filiere::find($id);


        return view('formations.create');
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
         $formation=Formation::create([
            'code' => $request->code,
            'nom' => $request->nom,
            'description' => $request->description,
            'filiere_id' => $request->filiere_id,

        ]);


        return redirect()->route('formations.index')
                        ->with('success','filiere crée avec succée.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialite $formation)

    {
        return view('specialites.edit',compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialite $formation)
    {
        $request->validate([

        'nomSpecialite',
        'description',
        'objectifs',
        'prerequis',
        'secteurs',

        ]);

        $formation->update($request->all());

        return redirect()->route('specialites.index')
                        ->with('success','formation modifiée avec succée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {


        //
    }
    public function search(Request $request )
    {
        $search=$request->get('search');
       $formation=DB::table('specialites')->where('nomSpecialite','like','%'.$search.'%')->paginate(5);
        return view('layouts.formation',compact('formation'));
    }
}
