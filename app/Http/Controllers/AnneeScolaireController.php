<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    public function index () {
        $anneeScolaires = AnneeScolaire::paginate(2);
        return view('back-end.pages.annee_scolaire.annee_scolaire' , compact('anneeScolaires') );
    }

    public function show ($id) {
        $anneeScolaire = AnneeScolaire::findOrFail($id);
        return view('back-end.pages.annee_scolaire.annee_scolaire-show' , compact('anneeScolaire'));
      }
      public function create (Request $request) {
          $request->validate([
              'nom'=>'required',
              'date_debut'=>'required',
              'date_fin'=>'required',
          ]);

          AnneeScolaire::create([
              'nom' => $request->nom ,
              'date_debut' => $request->date_debut ,
              'date_fin' => $request->date_fin ,
          ]);
          return redirect()->route('admin.anneeScolaire.index')->with('success' , "Annee Scolaire Ajouter");
      }
      public function update ($id , Request $request) {
          $anneeScolaire = AnneeScolaire::findOrFail($id);

          $anneeScolaire->nom = $request->nom ;
          $anneeScolaire->date_debut = $request->date_debut ;
          $anneeScolaire->date_fin = $request->date_fin ;
          $anneeScolaire->save();
          return redirect()->route('admin.anneeScolaire.index')->with('success' , "Annee Scolaire modifier");
      }

      public function delete ($id) {
          $anneeScolaire = AnneeScolaire::findOrFail($id);
          $anneeScolaire->delete();
          return redirect()->back()->with('success' , "Annee Scolaire Supprimer") ;
      }
}
