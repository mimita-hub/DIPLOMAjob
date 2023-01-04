<?php

namespace App\Http\Controllers;

use App\Models\Faculte;
use App\Models\Universite;
use Illuminate\Http\Request;
use Auth;


class FaculteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {  $typeUser=Auth::user()->type;
        if($typeUser=="univAdmin")
        { $id=Auth::id();
            $univ=Universite::where('user_id',$id)->get();
            $data=Faculte::where('universite_id',$univ->pluck('id'))->get();
            return view('facultes.index',compact('data'));


    }elseif($typeUser=="respFaculte"){
        $id=Auth::id();
        $univ=Faculte::where('user_id',$id)->get();
        $data=Faculte::where('id',$univ->pluck('id'))->get();

            return view('facultes.index',compact('data'));
    }}

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculte  $faculte
     * @return \Illuminate\Http\Response
     */
    public function show(Faculte $faculte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculte  $faculte
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculte $faculte)
    {
        return view('facultes.edit',compact('faculte'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculte  $faculte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculte $faculte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculte  $faculte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculte $faculte)
    {
        //
    }
}
