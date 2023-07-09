<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Etablissement;
class FiliereController extends Controller
{
    public function index () {
        $filieres = Filiere::paginate(2);
        $etablissements = Etablissement::all();
        return view('back-end.pages.filiere.filiere' , compact('filieres','etablissements'));
    }

    public function show ($id) {
      $filiere = Filiere::findOrFail($id);
      return view('back-end.pages.filiere.filiere-show' , compact('filiere'));
    }
    public function create (Request $request) {
        $request->validate([
            'nom'=>'required',
            'id_etablissement	'=>'required',
        ]);

        Filiere::create([
            'nom' => $request->nom ,
            'id_etablissement	' => $request->id_etablissement	 ,
        ]);
        return redirect()->route('admin.filiere.index')->with('success' , "Filiere Ajouter");
    }
    public function update ($id , Request $request) {
        $filiere = Filiere::findOrFail($id);

        $filiere->nom = $request->nom ;
        $filiere->id_etablissement	 = $request->id_etablissement	 ;
        $filiere->save();
        return redirect()->route('admin.filiere.index')->with('success' , "Filiere modifier");
    }

    public function delete ($id) {
        $filiere = Filiere::findOrFail($id);
        $filiere->delete();
        return redirect()->back()->with('success' , "Filiere Supprimer") ;
    }
}
