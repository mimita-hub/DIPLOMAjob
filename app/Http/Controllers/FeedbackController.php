<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Specialite;
use App\Models\Departement;
use App\Models\Module;
use Auth;
Use Alert;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $id=Auth::id();
        $user=Auth::user();
        if($user->type=="respSpecialite")
        {
            $specialite=Specialite::where('user_id',$id)->get();

            $data=Feedback::where('specialite_id',$specialite->pluck('id'))->get();

           return view("feedbacks.index",compact('data'));

        }elseif($user->type=="respDepartement"){

            $departement=Departement::where('user_id',$id)->first();
            $specialite=Specialite::where('departement_id',$departement->id)->get();

            $data=Feedback::all();



          return view("feedbacks.index",compact('data'));

        }elseif($user->type=="respFaculte")
        {
            $specialite=Specialite::where('user_id',$id)->get();

            $data=Feedback::where('specialite_id',$specialite->pluck('id'))->get();
           return view("feedbacks.index",compact('data'));
        }
        elseif($user->type=="univAdmin")
        {
            $specialite=Specialite::where('user_id',$id)->get();

            $data=Feedback::where('specialite_id',$specialite->pluck('id'))->get();
           return view("feedbacks.index",compact('data'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id)
    {
        $specialite=Specialite::find($id);
        $modules=Module::all();

        return view('feedbacks.create',compact('specialite','modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {  $user=Auth::id();
          Feedback::create([
             'commentaire' => $request['commentaire'],
             'rating' =>$request['rating'],
              'user_id' =>$user,
              'specialite_id' =>$id,
              'competence_id' =>$request['competence_id'],
              'elementcompetence_id' =>$request['elementcompetence_id'],


         ]);
         '<style>.color-99CC5B{background-color:#ff864e;}</style>';

         alert()->success('Envoyé','commentaire envoyé avec succée. Merci!')->showConfirmButton('ok', '#ff864e');
         return redirect()->route('create_feed',$id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spec=Specialite::find($id);

     return view('feedbacks.show',compact('spec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
