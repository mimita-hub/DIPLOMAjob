<?php

namespace App\Http\Controllers;

use App\Models\Prerequi;
use App\Models\Module;
use App\Models\Specialite;

use Auth;
use Illuminate\Http\Request;

class PrerequiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $id=Auth::id();
       $spec=Specialite::where('user_id',$id);
       $module=Module::where('specialite_id',$spec->pluck('id'))->get();
       $prerequi=Prerequi::all();

        return view('prerequis.index',compact('prerequi','module'));

    }
    public function arbre()
    {

        $module=Module::get();
        $id=$module->pluck('id')->first();
       $prerequis=Prerequi::where("module_id",$id);
       $mod=Module::where('titre',$prerequis->pluck('prerequis'))->get()->with('success','prerequis ajouté avec succée');;

        return view('prerequis.index',compact('mod'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=Module::find($id);
        $user=Auth::id();
       $spec=Specialite::where('user_id',$user);
       $modules=Module::where('specialite_id',$spec->pluck('id'))->get();


        return view('prerequis.create',compact('data','modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)

    {
             $p=Prerequi::create([
            'prerequis'   => implode(",",$request->prerequis),
            'module_id' =>$id

        ]);
        alert()->success('Ajouté','Prerequis Ajouté  avec succés')->showConfirmButton('ok', 'blue');

         return redirect()->route('prerequis.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prerequi  $prerequi
     * @return \Illuminate\Http\Response
     */
    public function show(Prerequi $prerequi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prerequi  $prerequi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  $prerequi= Prerequi::find($id);
        return view('prerequis.edit',compact('prerequi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prerequi  $prerequi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Prerequi $prerequi)
    {

        $request->validate([

            'prerequis'
            ]);
            $prerequi->update($request->all());


            return redirect()->route('prerequis.index')
                            ->with('success','prerequis modifiée avec succée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prerequi  $prerequi
     * @return \Illuminate\Http\Response
     */
    public function destroy($prerequi)
    {

        $prerequis=Prerequi::where('module_id',$prerequi);

        $prerequis->delete();

        return redirect()->route('prerequis.index')
                      ->with('success','Utilisateur supprimé avec succée.');
    }
}
