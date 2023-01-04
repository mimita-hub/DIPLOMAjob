<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Universite;
use Auth;
use DB;

class UniversiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {  $typeUser=Auth::user()->type;
        $id=Auth::id();


        if($typeUser=="adminSys")
        {
            $data=Universite::all();
            return view('Universite.index',compact('data'));

        }else{

           // Cette ligne est équivalente à select * from Universite
            $data=Universite::where('user_id',$id )->get();
            return view('Universite.index',compact('data'));

        }


         //   $user=Universite::user()->nom;



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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $univ=Universite::find($id);
        return view('Universite.show',compact('univ'));
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
        $univ=Universite::find($id);

        $univ->delete();

        return redirect()->route('Universite.index')
                        ->with('success','Université supprimé avec succée');
    }

    public function search(Request $request )
    {
        $search=$request->get('search');
        $data=DB::table('universites')->where('nom_universite','like','%'.$search.'%')->paginate(5);
        return view('Universite.index',compact('data'));
    }
}
