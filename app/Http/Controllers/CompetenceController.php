<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;
use DB;
use Auth;

class CompetenceController extends Controller
{
    /**s
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request )
    {
        $search=$request->get('search');
        $competences=DB::table('competences')->where('intitule','like','%'.$search.'%')->paginate(8);
        $elements=DB::table('elementcompetences')->where('intitule','like','%'.$search.'%')->paginate(8);
        return view('layouts.competence',compact('competences','elements'));
    }
    public function index()
    {     $data=Competence::all();
       return view('Competence.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Competence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [ 'code',
            'intitule',

          ]);
         Competence::create([
            'code' => $request->code,
            'intitule' => $request->intitule,


        ]);


        return redirect()->route('Competence.index')
                        ->with('success','Compétence crée avec succée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function show(Competence $competence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function edit(Competence $competence)
    {
            return view('Competence.edit',compact('competence'));


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competence $competence)
    {

            $request->validate([
                'code',
               'intitule'

            ]);

            $competence->update($request->all());

            return redirect()->route('Competence.index')
                            ->with('success','Compétence modifiée avec succée.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
            return redirect()->route('Competence.index')
                            ->with('success','Compétence supprimée avec succée.');


    }
}
