<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Semestre;
use App\Models\Specialite;
use App\Models\User;
use App\Models\Metier;
use App\Models\Competence;
use App\Models\Prerequi;
use App\Models\ElementCompetence;
use Validator;

use Auth;
use DB;
use PDF;
Use Alert;
use View;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $user=Auth::id();

        $data=Module::all()->where('user_id',$user);

        return view('Moduls.index',compact('data'));

    }
    public function detailsModule()
    {
        $user=Auth::id();

        $data=Module::all()->where('user_id',$user);
        return view('Moduls.detailsModule',compact('data'));
    }
    public function searchModule(Request $request )
    {
        $search=$request->get('search');
        $user=Auth::id();

       $data=DB::table('modules')->where('titre','like','%'.$search.'%')->where('user_id',$user)->get();


        return view('moduls.index',compact('data'));
    }

    public function search(Request $request )
    {
        $search=$request->get('search');
        $data=DB::table('modules')->where('semestre','like',$search)->paginate(5);
        return view('moduls.index',compact('data'));
    }


    public function create($id)
    {
        $mod=Module::all();
        $modules=Module::all();
        $spec=Specialite::where('user_id',$id )->get();
        $dataSpec=Specialite::where('id',$spec->pluck('id') )->get();

       foreach ($dataSpec as  $dataSpec)
       {
       }
     $data= $dataSpec;

        return view('moduls.create',compact('data','mod','modules'));
    }


    public function store(Request $request ,$id)
    {
       $id_user=Auth::id();

    $modules=Module::all();

   if(in_array($request->titre,$modules->pluck('titre')->toArray()))
   {

        alert()->Warning('Attention','Module exsite déja');
        return redirect()->back();

    }else{
        $module = new Module();

         $module->specialite_id=$id;
         $module->titre = $request->titre;
            $module->coeff = $request->coeff;
            $module->credit = $request->credit;
            $module->C = $request->C;
            $module->TD = $request->TD;
            $module->TP = $request->TP;
            $module->unite=$request->unite;
            $module->vsh=$request->vsh;
           $module->user_id=$id_user;
      //     $element=$request->element;
           $module->save();
           foreach($request->element as $index => $idelement){
           $element = $request->input('element')[$index];
           $ElementCompetence=ElementCompetence::where('intitule',$element)->first();
           $module->assignElement($ElementCompetence);
           }


           alert()->success('Ajouté','module ajouté avec succés')->showConfirmButton('ok', 'blue');

                return redirect()->route('moduls.index');
    }

    }

    public function show(Formation $formation)
    {
        //
    }

    public function edit(Module $modul)
    {

       $auth=Auth::id();
       $spec=Specialite::where('user_id',$auth )->get();
       $dataSpec=Specialite::where('id',$spec->pluck('id') )->get();
      // $ElementCompetence=ElementCompetence::where('intitule',$element)->first();

      foreach ($dataSpec as  $dataSpec)
      {
      }
    $specialite= $dataSpec;

       return view('moduls.edit',compact('modul','specialite'));
    }


    public function update(Request $request, Module $modul)
    {
        $auth=Auth::id();
        $spec=Specialite::where('user_id',$auth )->get();
        $dataSpec=Specialite::where('id',$spec->pluck('id') )->get();
        $request->validate([
            'titre' ,
            'coeff'  ,
            'credit' ,
            'unite',
            'vsh',
            'specialite_id',
            'user_id',
        ]);
        $modul->specialite_id=$modul->Specialite->id;
        $elementOld=Module::find($modul->id)->elementcompetences;

        for($i=0;$i<$elementOld->count();$i++)
        {
            $elementOld_id= $elementOld->pluck('id');
            $modul->elementcompetences()->detach($elementOld_id);
        }

      foreach($request->element as $index => $idelement)
         {
         $elementData=$request->input('element')[$index]; //element2 137
       $elementNV=ElementCompetence::where('intitule',$elementData);
       $elementNV_id=$elementNV->pluck('id');

       $modul->elementcompetences()->attach($elementNV_id);
       $modul->update($request->all());


         }


     /*    foreach($request->element as $index => $idelement)
         {
         $elementOld=Module::find($modul->id)->elementcompetences;
        $elementOld_id= $elementOld->pluck('id'); //138

         $elementData=$request->input('element')[$index]; //element2 137

       $elementNV=ElementCompetence::where('intitule',$elementData);
       $elementNV_id=$elementNV->pluck('id');

      for($i=0;$i<count($elementNV_id);$i++)
   {
      $modul->elementcompetences()->updateExistingPivot($elementOld_id, ['elementcompetence_id' => $elementNV_id[$i]]);

   } }*/



       alert()->success('Modifié','Module Modifié  avec succés')->showConfirmButton('ok', 'blue');


        return redirect()->route('moduls.index');

    }

    public function destroy($id)
    {   $semestre=Semestre::where('module_id',$id);
        $semestre->delete();
        $prerequi=Prerequi::where('module_id',$id)->delete();
        $module=Module::find($id);
        $module->delete();
        alert()->success('Supprimé','module supprimé avec succés')->showConfirmButton('ok', 'blue');;
        return redirect()->route('moduls.index');

    }


    public function AfficherTous()
    {
        $id=Auth::id();
        $specialite=Specialite::where('user_id',$id)->get();
        $semestre1=Semestre::where('specialite_id',$specialite->pluck('id'))->where('code',1)->get();
        $semestre2=Semestre::where('specialite_id',$specialite->pluck('id'))->where('code',2)->get();
        $semestre3=Semestre::where('specialite_id',$specialite->pluck('id'))->where('code',3)->get();

       /* $module=Module::where('specialite_id',$specialite->pluck('id'))->where('semestre',1)->get();
        $data2=Module::where('specialite_id',$specialite->pluck('id'))->where('semestre',2)->get();
        $data3=Module::where('specialite_id',$specialite->pluck('id'))->where('semestre',3)->get();*/
        return view('moduls.formation',compact('specialite','semestre1','semestre2','semestre3'));
    }
     public function pdfdash( $id )
    {
        $id_user=Auth::id();
        $specialite=Specialite::where('user_id',$id_user)->get();
        $semestre1=Semestre::where('specialite_id',$specialite->pluck('id'))->where('code',1)->get();
        $semestre2=Semestre::where('specialite_id',$specialite->pluck('id'))->where('code',2)->get();
        $semestre3=Semestre::where('specialite_id',$specialite->pluck('id'))->where('code',3)->get();


        // L'instance PDF avec une vue : resources/views/posts/show.blade.php
        $pdf = PDF::loadView('moduls.pdfdash', ['specialite' => $specialite,'semestre1'=>$semestre1,'semestre2'=>$semestre2,'semestre3'=>$semestre3])->setOptions(['defaultFont' => 'sans-serif']);



        //$pdf = PDF::loadView('moduls.pdf',compact('data','module'));
        return $pdf->download('details.pdf');
    }
     public function validerFormation()
     {
        $id=Auth::id();
        $specialite=Specialite::where('user_id',$id)->get();
        $module=Module::where('specialite_id',$specialite->pluck('id'))->get();
        $VHcours=Module::where('specialite_id',$specialite->pluck('id'))->sum('C')/60%60;
        $VHtd=Module::where('specialite_id',$specialite->pluck('id'))->sum('TD')/60%60;
        $VHtp=Module::where('specialite_id',$specialite->pluck('id'))->sum('TP')/60%60;
        $credit=Module::where('specialite_id',$specialite->pluck('id'))->sum('credit');


        $danger = [];
        $success = [];

        $VHcours > 483? $danger[0] = "Vous Avez depassé le volume horaire de cours" : $success[1] = "Vous Avez respecté le volume horaire de cours";
        $VHtd > 1 ? $danger[2] = "Vous Avez depassé le volume horaire de TD": $success[3] = "Vous Avez respecté le volume horaire de TD";
        $VHtp >231 ? $danger[4] = "Vous Avez depassé le volume horaire de TP" : $success[5] = "Vous Avez respecté le volume horaire de TP";
        $credit>120 ? $danger[6] = "Vous Avez depassé le total des crédits total" : $success[7] = "Vous Avez respectéé le total des crédits total";




        return view('moduls.ValiderFormation',[
            'success' => $success,
            'danger' => $danger,
            'VHcours'=>$VHcours,
            'VHtd'=>$VHtd,
            'VHtp'=>$VHtp,
            'credit'=>$credit,

        ]);



    }
}
