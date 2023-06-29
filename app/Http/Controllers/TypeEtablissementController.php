<?php

namespace App\Http\Controllers;
use App\Models\TypeEtablissement;
use Illuminate\Http\Request;

class TypeEtablissementController extends Controller
{
    public function index () {
        $typeEtablissements = TypeEtablissement::paginate(2);
        return view('back-end.pages.TypeEtablissement.type-etablissement' , compact('typeEtablissements'));
    }

    public function show ($id) {
      $typeEtablissements = TypeEtablissement::findOrFail($id);
      return view('back-end.pages.TypeEtablissement.type-etablissement-show' , compact('typeEtablissements'));
    }
    public function create (Request $request) {
        $request->validate([
            'nom'=>'required',
        ]);

        TypeEtablissement::create([
            'nom' => $request->nom ,
        ]);
        return redirect()->route('admin.typeEtablissement.index')->with('success' , "TypeEtablissement Ajouter");
    }
    public function update ($id , Request $request) {
        $typeEtablissement = TypeEtablissement::findOrFail($id);

        $typeEtablissement->nom = $request->nom ;
        $typeEtablissement->save();
        return redirect()->route('admin.typeEtablissement.index')->with('success' , "TypeEtablissement modifier");
    }

    public function delete ($id) {
        $typeEtablissement = TypeEtablissement::findOrFail($id);
        $typeEtablissement->delete();
        return redirect()->back()->with('success' , "TypeEtablissement Supprimer") ;
    }
}
