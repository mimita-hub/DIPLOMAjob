<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Entreprise;
use App\Models\Universite;
use App\Models\Role;
Use Alert;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'dash';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
           'date_naissance' => ['required', 'string'],
            'sexe' => ['required', 'string'],
            'adresse' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

       $user= User::create([
            'nom' => $data['nom'],
           'prenom' => $data['prenom'],
           'date_naissance' => $data['date_naissance'],
            'sexe' => $data['sexe'],
           'adresse' => $data['adresse'],
            'type' =>$data['type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
   $type="univAdmin";
    if($data['type']=="etudiant")
    {
        $type="etudiant";
        Etudiant::create([
            'user_id'=>   $user->id,
           'université'=> $data['université'],
            'filiere' => $data['filiere'],

        ]);
    }elseif($data['type']=="responsable_rh") {
        $type="responsable_rh";
        Entreprise::create([

            'nomEntreprise'=>$data['nomEntreprise'],
                'secteur_entreprise'=>$data['secteur_entreprise'],
                'description_entreprise' =>$data['description_entreprise'],
                'lieu_entreprise' =>$data['lieu_entreprise'],
                'téléphone'=>$data['téléphone'],
                'adresse_mail_entreprise'=>$data['adresse_mail_entreprise'],
                'user_id'   =>  $user->id,
                ]);
    }else{
        $type="univAdmin";
        Universite::create([
                'nom_universite'=>$data['nom_universite'],
                'adr_mail'=>$data['adr_mail'],
                'description'=>$data['description'],
                'user_id'   =>   $user->id,
                ]);
    }

    $role = Role::where('role',$type)->first();
    $user->assignRole($role);


    return $user;




}

}
