<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Specialite;
use App\Models\Faculte;
use Auth;
use DB;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {  $id=Auth::id();
        $univ=DB::select("select *from universites where user_id='$id'");
        $x=Faculte::where('user_id',$id)->first();
        if (Auth::user()->type=="univAdmin" )
        {

            $data=Departement::all();

            return view('departement.index',compact('data','univ'));
        }
        elseif(Auth::user()->type=="respFaculte")
        {

            $data=Departement::all();
            return view('departement.index',compact('data','x','univ'));

        }
        elseif(Auth::user()->type=="respDepartement")
        {

            $data=Departement::where('user_id',$id)->get();

            return view('departement.index',compact('data','x','univ'));

        }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        //
    }
}
