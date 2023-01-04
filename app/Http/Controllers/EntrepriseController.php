<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Feedback;
use DB;
use Alert;

class EntrepriseController extends Controller
{
    public function search(Request $request )
    {

       if($request->entreprisecherche){
        $entreprises=DB::table('entreprises')->where('nomEntreprise','like','%'.$request->entreprisecherche.'%')
                                             ->orWhere('description_entreprise','like','%'.$request->entreprisecherche.'%')
                                              ->get();
        }
        if($request->secteurcherche){
            $entreprises=DB::table('entreprises')->where('secteur_entreprise','like','%'.$request->secteurcherche.'%')->get();


        }
        if($request->entreprisecherche && $request->secteurcherche){
            $entreprises=DB::table('entreprises')->where('nomEntreprise','like','%'.$request->entreprisecherche.'%')
                                                  ->orWhere('description_entreprise','like','%'.$request->entreprisecherche.'%')
                                                  ->where('secteur_entreprise','like','%'.$request->secteurcherche.'%')
                                                 ->get();

        }
            return view('layouts.entreprise',compact('entreprises'));
    }
    public function supprimefeed($id){
        $feed=Feedback::find($id);

        $feed->delete();

        alert()->success('supprimé','feedback supprimé avec succés');
        return redirect()->route('entrepriseFeed');
                        }
}
