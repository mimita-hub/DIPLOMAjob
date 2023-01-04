<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;
use Auth;
use App\Models\Specialite;
use App\Models\Module;
use App\Models\User;
use App\Models\Prerequi;
use Alert;
use DB;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semestre=Semestre::all()->sortBy('code');
        return view('semestres.index',compact('semestre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=Auth::id();
       $specialite=Specialite::where('user_id',$id)->get();
         $module=Module::where('user_id',$id)->get();
        $idModule=$module->pluck('id');

        $modulePrerequis=DB::select("select * from prerequis ");


         return view('semestres.create',compact('specialite','module','modulePrerequis'));
    }

    public function createStep2()

        {
            $id=Auth::id();
            $specialite=Specialite::where('user_id',$id)->get();
              $module=Module::where('user_id',$id)->get();
             $idModule=$module->pluck('id');
             $modulePrerequis=DB::select("select * from prerequis ");
             $semestre=DB::select("select module_id from semestres where code != 1");
              return view('semestres.step2',compact('semestre','specialite','module','modulePrerequis'));


        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=Auth::id();
        $user=User::where('id',$id);
        $specialite=Specialite::where('user_id',$user->pluck('id'))->get();
        $isSpec=$specialite->pluck('id')->first();

        foreach($request->module_id as $index => $idmodule){
            $data = new Semestre();
            $data->code = $request->code;
            //(in_array($request->code,$data->pluck('code')->toArray()
          /*  if(in_array($request->input('module_id')[$index],$data->pluck('module_id')->toArray()))
            {
                //$nom=Module::where('id',$data->pluck('module_id'))->first();
                alert()->Warning('Attention','Module  exsite déja dans un autre semestre  ');
                return redirect()->back();

            }else{*/
               $data->module_id = $request->input('module_id')[$index];
               $data->specialite_id =$isSpec;
                $data->save();


          }
          alert()->success('Crée','Semestre crée avec succés.');
          return redirect()->route('semestres.index');







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function afficher()
    {
       $id=Auth::id();
      $specialite=Specialite::where('user_id',$id);
        $semestre=Semestre::where('specialite_id',$specialite->pluck('id'))->get();
        $spec=$specialite->pluck('nomSpecialite')->first();
        return view('semestres.show',compact('semestre','spec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $semestre= Semestre::find($id);
     $idsemestre=$semestre->pluck('module_id')->get('module_id');
     $module=Module::where('id',$idsemestre)->get();

     $user=Auth::id();
     $specialite=Specialite::where('user_id',$user)->get();
       $module=Module::where('user_id',$user)->get();
      $idModule=$module->pluck('id');

      $modulePrerequis=DB::select("select * from prerequis ");
     return view('semestres.edit',compact('semestre','module','modulePrerequis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semestre $semestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $semestre=Semestre::find($id);

        $semestre->delete();
        alert()->success('Supprimé','Module de Semestre supprimé avec succée.')->showConfirmButton('ok', 'info');

        return redirect()->route('semestres.index') ;
    }

    public function resultat(request $request)
    {

        $user=Auth::id();



        $Prerequis=Prerequi::all();
        // dd($module[0]);
        $dependent='Resultat';
        //hada data li b3atiha ba ajax
        $value = $request->get('value');

        // $value = 1;
        //start hna deri code dyalk les requêtes
        if($value == 1){
            foreach($Prerequis as $Prerequis){
           $filterarticles = Module::where('user_id',$user)->get();
            }
                   }elseif($value == 2){
            $filterarticles = Prerequi::all();
        }else{
            $filterarticles = Prerequi::all();

        }

        //end hna deri code dyalk les requêtes



        $output = '<option value="" disabled>'.ucfirst($dependent).'</option>';
        if($value == 1){
            foreach ($filterarticles  as $row) {
                $output .= '<option value='.$row->id.'>'.$row->titre.'</option>';
            }


            echo $output;   }
        elseif($value == 2){
            foreach ($filterarticles  as $row) {
                $output .= '<option value='.$row->module_id.'>'.$row->module->titre.'</option>';
            }


            echo $output;
        }else{
            foreach ($filterarticles  as $row) {
                $output .= '<option value='.$row->module_id.'>'.$row->module->titre.'</option>';
            }


            echo $output;
        }


    }

}
