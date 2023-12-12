<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use Illuminate\Http\Request;

class ApprenantController extends Controller
{
    public function index()
    {
        $listeApprenants = Apprenant::all();
        return view("apprenants/liste",["listeApp" => $listeApprenants]);
//        return view("apprenants/liste",compact($listeApprenants));
    }
    public function create()
    {
        return view("apprenants.create");
    }

    public function store(Request $request)
    {
//        dd($request->all());
//        dd($request->input('nom'));
        /*Apprenant::create([
            "nom" => $request->input('nom'),
            "prenom" => $request->input('prenom'),
            "matricule" => $request->input('matricule'),
            "telephone" => $request->input('telephone')
        ]);*/

        $request->validate(
            [
                "nom" => "required",
                "prenom" => "required",
                "matricule" => "required",
                "telephone" => "required"
            ]
        );

        Apprenant::create($request->all());

        /*$apprenant = new Apprenant();
        $apprenant->nom = $request->input("nom");
        $apprenant->prenom = $request->input("prenom");
        $apprenant->matricule = $request->input("matricule");
        $apprenant->telephone = $request->input("telephone");*/

    }
}
