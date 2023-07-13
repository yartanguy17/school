<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\Zone;
use App\Models\Categorie;
use App\Models\TypeEtablissement;

class EtablissementController extends Controller
{
    public function index () {
        $etablissements = Etablissement::paginate(2);
        $zones = Zone::all();
        $categories = Categorie::all();
        $type_etablissements = TypeEtablissement::all();
        return view('back-end.pages.Etablissement.etablissement' , compact('etablissements','zones','categories','type_etablissements'));
    }

    public function show ($id) {
      $etablissement = Etablissement::findOrFail($id);
      $zones = Zone::all();
      $categories = Categorie::all();
      $type_etablissements = TypeEtablissement::all();
      return view('back-end.pages.Etablissement.etablissement-show' ,  compact('etablissement','zones','categories','type_etablissements'));
    }
    public function create (Request $request) {

        $request->validate([
            'nom'=>'required',
            'fondateur'=>'required',
            'telephone'=>'required',
            'adresse'=>'required',
            'type_etablissement_id'=>'required',
            'zones_id'=>'required',
            'categories_id'=>'required',
            'numero_manuel'=>'required',

        ]);

        Etablissement::create([
            'nom' => $request->nom ,
            'fondateur' => $request->fondateur ,
            'telephone' => $request->telephone ,
            'adresse' => $request->adresse ,
            'type_etablissement_id' => $request->type_etablissement_id ,
            'zones_id' => $request->zones_id ,
            'categories_id' => $request->categories_id ,
            'numero_manuel'=> $request->numero_manuel ,
        ]);
        return redirect()->route('admin.etablissement.index')->with('success' , "Etablissement Ajouter");
    }

    public function update ($id , Request $request) {
        $etablissement = Etablissement::findOrFail($id);

        $etablissement->nom = $request->nom ;
        $etablissement->fondateur = $request->fondateur ;
        $etablissement->telephone = $request->telephone ;
        $etablissement->adresse = $request->adresse ;
        $etablissement->type_etablissement_id = $request->type_etablissement_id ;
        $etablissement->zones_id = $request->zones_id ;
        $etablissement->categories_id = $request->categories_id ;
        $etablissement->save();
        return redirect()->route('admin.etablissement.index')->with('success' , "Etablissement modifier");
    }

    public function delete ($id) {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->delete();
        return redirect()->back()->with('success' , "Etablissement Supprimer") ;
    }
}
