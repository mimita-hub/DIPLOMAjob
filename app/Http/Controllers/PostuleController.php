<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postule;
use App\Models\Etudiant;
use App\Models\Emploi;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use alert;
class PostuleController extends Controller
{
    //
  public function store(Request $request ,$id){
   $idetudiant=Auth::id();

   $etudiant=Etudiant::where('user_id',$idetudiant)->first();
   $univ= $etudiant->pluck('université')->first();
   $user=User::find($idetudiant);
   $offre=Emploi::find($id);
   $date=Carbon::now()->format('Y-m-d');

       if($request->hasfile('image')){
            $file=$request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename=$user->nom.$user->prenom.'.'. $extention;
            $file->move('/storage/cv/',$filename);
            Postule::create([
             'cv'=> $filename,
             'nometudiant'=> $user->nom.' '.$user->prenom,
             'nomuniversite'=> $univ,
             'filiere'=> $etudiant->filiere,
             'nomoffre'=>$offre->nompost,
             'emploi_id'=>$id,
             'etudiant_id'=> $etudiant->id,
            ]);


        }
        alert()->success('Envoyé','Votre Cv est envoyé avec succés');
        return redirect()->route('app_afficheremploi',[$offre->id,$offre->entreprise_id]);

    }
}
