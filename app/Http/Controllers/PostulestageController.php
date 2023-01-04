<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulestage;
use App\Models\Stage;
use App\Models\Etudiant;
use App\Models\User;
use Auth;
use Alert;
class PostuleStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $idetudiant=Auth::id();

   $etudiant=Etudiant::where('user_id',  $idetudiant)->first();

   $user=User::find($idetudiant);
   $stage=Stage::find($id);


       if($request->hasfile('file')){
            $file=$request->file('file');
            $extention= $file->getClientOriginalExtension();
            $filename=$user->nom.$user->prenom.'.'. $extention;
            $file->move('storage/cv/', $filename);
            Postulestage::create([
             'cv'=> $filename,
             'nometudiant'=> $user->nom.' '.$user->prenom,
             'nomuniversite'=> $etudiant->université,
             'filiere'=> $etudiant->filiere,
             'nomoffre'=>$stage->nomstage,

             'stage_id'=>$id,
             'etudiant_id'=> $etudiant->id,
            ]);

        }
        alert()->success('Envoyé','votre CV est envoyé avec succés');
        return redirect()->route('app_afficherstage',[$stage->id,$stage->entreprise_id]);
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
        //
    }
}
