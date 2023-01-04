<?php

namespace App\Http\Controllers;

use App\Models\Remarque;
use App\Models\Feedback;

use Illuminate\Http\Request;
use Auth;
use PDF;


class RemarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Remarque::all();

            return  view('remarques.index',compact('data'));



    }




    public function rapport()
    {
        $data=Remarque::all();


       return  view('remarques.rapport',compact('data'));
    }
    public function pdfRapport( )
    {
         $data=Remarque::all();

        // L'instance PDF avec une vue : resources/views/posts/show.blade.php
        $pdf = PDF::loadView('remarques.pdfRapport', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);



        //$pdf = PDF::loadView('moduls.pdf',compact('data','module'));
        return $pdf->download('Rapport.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $feed=Feedback::find($id);
        return view('remarques.create',compact('feed'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {  $user=Auth::id();
         Remarque::create([
             'description' => $request['description'],
              'user_id' =>$user,
              'feedback_id' =>$id,


         ]);
         return redirect()->route('remarques.index')
         ->with('success','remarque ajoutée avec succée. Super!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Remarque  $remarque
     * @return \Illuminate\Http\Response
     */
    public function show(Remarque $remarque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remarque  $remarque
     * @return \Illuminate\Http\Response
     */
    public function edit(Remarque $remarque)
    {


        return view('remarques.edit',compact('remarque'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Remarque  $remarque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Remarque $remarque)
    {
        $remarque->update($request->all());

        alert()->success('Modifié','Remarque Modifiée  avec succés')->showConfirmButton('ok', 'blue');


        return redirect()->route('remarques.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remarque  $remarque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $remarque=Remarque::find($id);
        $remarque->delete();
        alert()->success('Supprimé','remarque supprimée avec succés')->showConfirmButton('ok', 'blue');;
        return redirect()->route('remarques.index');

    }
}
