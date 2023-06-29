<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
class ZoneController extends Controller
{
    public function index () {
        $zones = Zone::paginate(2);
        return view('back-end.pages.Categorie.categorie' , compact('zones'));
    }

    public function show ($id) {
      $zone = Zone::findOrFail($id);
      return view('back-end.pages.Categorie.categorie-show' , compact('zone'));
    }
    public function create (Request $request) {
        $request->validate([
            'nom'=>'required',
        ]);

        Zone::create([
            'nom' => $request->nom ,
        ]);
        return redirect()->route('admin.zone.index')->with('success' , "Zone Ajouter");
    }
    public function update ($id , Request $request) {
        $zone = Zone::findOrFail($id);

        $zone->nom = $request->nom ;
        $zone->save();
        return redirect()->route('admin.zone.index')->with('success' , "Zone modifier");
    }

    public function delete ($id) {
        $zone = Zone::findOrFail($id);
        $zone->delete();
        return redirect()->back()->with('success' , "Zone Supprimer") ;
    }
}
