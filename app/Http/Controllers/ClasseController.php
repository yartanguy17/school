<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etablissement;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index () {
        $classes = Classe::paginate(2);
        $etablissements = Etablissement::all();
        return view('back-end.pages.classe.classe' , compact('classes','etablissements'));
    }

    public function show ($id) {
      $classe = Classe::findOrFail($id);
      $etablissements = Etablissement::all();
      return view('back-end.pages.classe.classe-show' , compact('classe' , 'etablissements'));
    }
    public function create (Request $request) {
        $request->validate([
            'nom'=>'required',
            'etablissement_id'=>'required',
        ]);

        Classe::create([
            'nom' => $request->nom ,
            'etablissement_id' => $request->etablissement_id	 ,
        ]);
        return redirect()->route('admin.classe.index')->with('success' , "classe Ajouter");
    }
    public function update ($id , Request $request) {
        $classe = Classe::findOrFail($id);

        $classe->nom = $request->nom ;
        $classe->etablissement_id	 = $request->etablissement_id	 ;
        $classe->save();
        return redirect()->route('admin.classe.index')->with('success' , "classe modifier");
    }

    public function delete ($id) {
        $classe = Classe::findOrFail($id);
        $classe->delete();
        return redirect()->back()->with('success' , "classe Supprimer") ;
    }
}
