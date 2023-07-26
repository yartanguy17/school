<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Etudiant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view('back-end.pages.connexion');
    }

    public function error () {
          return view('back-end.pages.AccessError');
    }

    public function login (Request $request) {
        $request->validate([
           'email'=>'required',
           'password'=>'required',
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)) {

           return redirect()->route('admin.dashboard');
        }else{
           return redirect('/')->with('error' , "email ou mot de passe incorrect");
        }
        }

        public function logout () {
         Auth::logout();
         return redirect('/');
        }

        public function dashboard() {
            $data_etablissements = Etablissement::select('id','created_at')->get()->groupBy(function ($data){
                return Carbon::parse($data->created_at)->format('M');
            });
            $etablissementMonth = [];
            $etablissementCount = [];
            foreach($data_etablissements as $month => $value) {
                $etablissementMonth[] = $month ;
                $etablissementCount[] = count($value);
            }


            $data_etudiants = Etudiant::select('id','created_at')->get()->groupBy(function ($data){
                return Carbon::parse($data->created_at)->format('M');
            });
            $etudiantMonth = [];
            $etudiantCount = [];
            foreach($data_etudiants as $month => $value) {
                $etudiantMonth[] = $month ;
                $etudiantCount[] = count($value);
            };

            $etudiants = Etudiant::all();
            $etablissements = Etablissement::all();
            return view('back-end.pages.dashboard' , compact('etablissementCount','etudiantCount','etablissementMonth','etudiantMonth','data_etablissements' , 'data_etudiants' , 'etudiants' , 'etablissements'));
        }
}
