<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\User;
use App\Models\Departement;
use App\Models\Specialite;
use App\Models\Faculte;
use App\Models\Role;
use Auth;
use DB;
use Form;

use App\Models\Universite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\TransactionImport;
use Alert;

class MembereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   $id=Auth::id();
         $univ=DB::select("select *from universites where user_id='$id'");
         if (Auth::user()->type=="univAdmin")
         {
        $data=DB::select("select * from users where type='respSpecialite' or type ='respFaculte' or type ='respDepartement' and  id='$id'  ");

            return view('membres.index',compact('data','univ'));
         }elseif (Auth::user()->type=="respFaculte")
         {
            $fac=DB::select("select *from facultes where user_id='$id'");
        $data=DB::select("select * from users where type='respDepartement' or type='respSpecialite' and id='$id'");
        return view('facultes.index',compact('data','univ','fac'));}
        elseif(Auth::user()->type=="respDepartement")
        {  $id=Auth::id();
          $dep=Departement::where( 'user_id',$id)->get();
          $dataa=Specialite::where('departement_id',$dep->pluck('id'))->get();
          $data=User::find($dataa->pluck('user_id'));

       return view('departement.index',compact('data','univ'));}
    }

    public function create($id)
    {
        if(Auth::user()->type=="univAdmin")
        {$univ=Universite::where('user_id',$id )->get();
            $dataUniv=Universite::where('id',$univ->pluck('id') )->get();
           foreach( $dataUniv as  $dataUniv)
           {
           }
         $data= $dataUniv->id;
         return view('membres.create',compact('data')); }
       elseif(Auth::user()->type=="respFaculte")
        {
            $fac=Faculte::where('user_id',$id )->get();
           $dataFac=Faculte::where('id',$fac->pluck('id') )->get();
          foreach($dataFac as $dataFac)
          {
          }
        $data=$dataFac->id;
        return view('membres.create',compact('data'));
        }elseif((Auth::user()->type=="respDepartement"))

      {   $fac=Departement::where('user_id',$id )->get();
        $dataFac=Departement::where('id',$fac->pluck('id') )->get();
       foreach($dataFac as $dataFac)
       {
       }
     $data=$dataFac->id;

        return view('membres.create',compact('data'));
    }

    }
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
    protected function store(Request $request ,$id)
        {

            $idUser=Auth::id();
       $user=User::create([
            'nom' => $request['nom'],
           'prenom' => $request['prenom'],
           'date_naissance' => $request['date_naissance'],
            'sexe' => $request['sexe'],
           'adresse' => $request['adresse'],
            'type' =>$request['type'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),

        ]);



        $type="respSpecialite";
        if( $request['type']=="respFaculte")
        {
            $type="respFaculte";
            $fac=Faculte::create([
                'nomFaculte'=> $request['nomFaculte'],
                'user_id'=>  $user->id,
                'universite_id'=>$id,

            ]);
            $role = Role::where('role',$type)->first();
    $user->assignRole($role);
    alert()->success('Creé' ,'Membre crée avec succéss');
    return redirect()->route("facultes.index");


        }
       elseif( $request['type']=="respDepartement") {
            $type="respDepartement";
           Departement::create([

            'nomDepartement'=> $request['nomDepartement'],
            'user_id'=>   $user->id,
            'faculte_id'=>$id,
                    ]);
                    $role = Role::where('role',$type)->first();
    $user->assignRole($role);
    alert()->success('Creé' ,'Membre crée avec succéss');

    return redirect()->route("departement.index");

        }else
          {

            $type="respSpecialite" ;
           Specialite::create([
            'nomSpecialite'=>$request['nomSpecialite'],
            'user_id'=>   $user->id,
            'departement_id'=>$id,
                    ]);
                    $role = Role::where('role',$type)->first();
    $user->assignRole($role);
    return redirect()->route("liste")->with('success','Membre crée avec succée.');

        }
   }



public function show($id)
    {

        $univ=User::find($id);
        return view('membres.show',compact('univ'));
    }

    public function destroy($id)
    {
        $user=User::find($id);

        $user->delete();

        return redirect()->route('membres.index')
                      ->with('success','Membre supprimé avec succée.');
    }

    public function import($id)
    {


        if(Auth::user()->type=="univAdmin")
        {$univ=Universite::where('user_id',$id )->get();
            $dataUniv=Universite::where('id',$univ->pluck('id') )->get();
           foreach( $dataUniv as  $dataUniv)
           {
           }
         $data= $dataUniv->id;
         return view('membres.import',compact('data')); }
       elseif(Auth::user()->type=="respFaculte")
        {
            $fac=Faculte::where('user_id',$id )->get();
           $dataFac=Faculte::where('id',$fac->pluck('id') )->get();
          foreach($dataFac as $dataFac)
          {
          }
        $data=$dataFac->id;

        return view('membres.import',compact('data'));
        }elseif((Auth::user()->type=="respDepartement"))

      {   $fac=Departement::where('user_id',$id )->get();
        $dataFac=Departement::where('id',$fac->pluck('id') )->get();
       foreach($dataFac as $dataFac)
       {
       }
     $data=$dataFac->id;

        return view('membres.import',compact('data'));
    }
    }
    protected function importStore(Request $request ,$id)
    {
        Excel::import(new TransactionImport(),$request->file(key:'import_file'));


        alert()->success('Importé','utilisateurs Importés avec succés')->showConfirmButton('ok', 'blue');

        return redirect()->route("membres.index")->with('success','Membre crée avec succée.');

    }
}
