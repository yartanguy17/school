<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\AnneeScolaire;
use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{

    public function index () {
        $inscriptions = Inscription::paginate(2);
        $anneeScolaires  = AnneeScolaire::all();
        $etudiants = Etudiant::all();
        $fillieres = Filiere::all();
        return view('back-end.pages.inscription.inscription' , compact('inscriptions' , 'anneeScolaires' , 'etudiants' , 'fillieres'));
    }

    public function show ($id) {
      $inscription = Inscription::findOrFail($id);
      $anneeScolaires  = AnneeScolaire::all();
      $etudiants = Etudiant::all();
      $fillieres = Filiere::all();
      return view('back-end.pages.inscription.inscription-show' , compact('inscription' , 'anneeScolaires' , 'etudiants' , 'fillieres'));
    }
    public function create (Request $request) {
        $request->validate([
            'annee_scolaire_id' => 'required' ,
            'filliere_id' => 'required' ,
            'etudiant_id' => 'required' ,
        ]);

        Inscription::create([
            'annee_scolaire_id' => $request->annee_scolaire_id ,
            'filliere_id' => $request->filliere_id ,
            'etudiant_id' => $request->etudiant_id ,
        ]);
        return redirect()->route('admin.inscription.index')->with('success' , "inscription Ajouter");
    }
    public function update ($id , Request $request) {
        $inscription = Inscription::findOrFail($id);


        $inscription->annee_scolaire_id= $request->annee_scolaire_id ;
        $inscription->filliere_id = $request->filliere_id ;
        $inscription->etudiant_id = $request->etudiant_id ;
        $inscription->save();
        return redirect()->route('admin.inscription.index')->with('success' , "inscription modifier");
    }

    public function delete ($id) {
        $inscription = Inscription::findOrFail($id);
        $inscription->delete();
        return redirect()->back()->with('success' , "inscription Supprimer") ;
    }
}
