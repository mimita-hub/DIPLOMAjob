<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Role;
use App\Models\Etudiant;
use App\Models\Entreprise;
use App\Models\Universite;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data=User::all();



        return view('User.index',compact('data'));
    }

    public function create()
    {

        return view('User.create');
    }
    public function edit(User $user)
    {

        return view('User.edit',compact('user'));
    }
    protected function store(Request $request)
    {

       $user= User::create([
            'nom' => $request['nom'],
           'prenom' => $request['prenom'],
           'date_naissance' => $request['date_naissance'],
            'sexe' => $request['sexe'],
           'adresse' => $request['adresse'],
            'type' =>$request['type'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);


    if($request['type']=="etudiant")
    {

        Etudiant::create([
            'user_id'=>   $user->id,
           'université'=> $request['université'],
            'filiere' => $request['filiere'],

        ]);
    }
    elseif($request['type']=="responsable_rh") {



        Entreprise::create([

            'nomEntreprise'=>$request['nomEntreprise'],
                'secteur_entreprise'=>$request['secteur_entreprise'],
                'user_id'   =>   $user->id,
                ]);
    }elseif($request['type']=="admin_univ"){

        Universite::create([
                'nom_universite'=>$request['nom_universite'],
                'adr_mail'=>$request['adr_mail'],
                'description'=>$request['description'],
                'user_id'   =>   $user->id,
                ]);
    }
    {

    }
    $role = Role::where('role',$type)->first();
    $user->assignRole($role);
    return redirect()->route("User.index")->with('success','Utilisateur crée avec succés.');
}



public function show($id)
    {

        $univ=User::find($id);
        return view('User.show',compact('univ'));
    }

    public function destroy($id)
    {
        $user=User::find($id);

        $user->delete();

        return redirect()->route('User.index')
                      ->with('success','Utilisateur supprimé avec succée.');
    }



    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom',
            'prenom',

           'adresse',
            'email',
            'password'

        ]);

        $user->update($request->all());

        return redirect()->route('User.index')
                        ->with('success','Profil modifiée avec succée.');
    }

    public function profil(User $user)
    {
        return view('adminDash.profil',compact('user'));
    }
    public function ModifierProfil(User $user)
    {
        return view('adminDash.modifierProfil',compact('user'));
    }

    public function updateProfil(Request $request)
    {   $user=Auth::user();
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->date_naissance = $request->input('date_naissance');

        $user->adresse = $request->input('adresse');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();




        return redirect()->route('profil',$user)
                        ->with('success','Profil modifiée avec succée.');
    }
}
