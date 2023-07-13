<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index () {
        $etudiants = Etudiant::paginate(2);
        return view('back-end.pages.etudiant.etudiant' , compact('etudiants'));
    }

    public function show ($id) {
      $etudiant = Etudiant::findOrFail($id);
      return view('back-end.pages.etudiant.etudiant-show' , compact('etudiant'));
    }
    public function create (Request $request) {

      /*  $request->validate([
            'nom'=>'required',
            'prenom' => 'required',
            'sexe'=>'required',
            'date_naissance' => 'required',
            'lieu_naissance'=>'required' ,
            'adresse'=>'required',
            'contact'=>'required',
        ]);*/

        Etudiant::create([
            'nom' => $request->nom ,
            'prenom' => $request->prenom,
            'sexe'=>$request->sexe,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance'=>$request->lieu_naissance ,
            'adresse'=>$request->adresse,
            'contact'=>$request->contact,
        ]);
        return redirect()->route('admin.etudiant.index')->with('success' , "etudiant Ajouter");
    }
    public function update ($id , Request $request) {
        $etudiant = Etudiant::findOrFail($id);

        $etudiant->nom = $request->nom ;
        $etudiant->prenom = $request->prenom;
        $etudiant->sexe=$request->sexe;
        $etudiant->date_naissance =$request->date_naissance;
        $etudiant->lieu_naissance=$request->lieu_naissance ;
        $etudiant->adresse=$request->adresse;
        $etudiant->contact=$request->contact;
        $etudiant->save();
        return redirect()->route('admin.etudiant.index')->with('success' , "etudiant modifier");
    }

    public function delete ($id) {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->back()->with('success' , "etudiant Supprimer") ;
    }
}
