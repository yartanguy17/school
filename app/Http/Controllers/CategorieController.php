<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
    public function index () {
        $categories = Categorie::paginate(2);
        return view('back-end.pages.Categorie.categorie' , compact('categories'));
    }

    public function show ($id) {
      $categorie = Categorie::findOrFail($id);
      return view('back-end.pages.Categorie.categorie-show' , compact('categorie'));
    }
    public function create (Request $request) {
        $request->validate([
            'nom'=>'required',
        ]);

        Categorie::create([
            'nom' => $request->nom ,
        ]);
        return redirect()->route('admin.categorie.index')->with('success' , "Categorie Ajouter");
    }
    public function update ($id , Request $request) {
        $categorie = Categorie::findOrFail($id);

        $categorie->nom = $request->nom ;
        $categorie->save();
        return redirect()->route('admin.categorie.index')->with('success' , "Categorie modifier");
    }

    public function delete ($id) {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->back()->with('success' , "Categorie Supprimer") ;
    }
}
