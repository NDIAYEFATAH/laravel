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
        $listeApprenants = new Apprenant();
        return view("apprenants.create",['listeApprenants'=>$listeApprenants]);
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
        return to_route('students-list');

    }
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                "nom" => "required",
                "prenom" => "required",
                "matricule" => "required",
                "telephone" => "required"
            ]
        );
        Apprenant::find($id)->update($request->all());
        return to_route('students-list');

    }
    public function edit(string $id)
    {
        $listeApprenants =new Apprenant();
        return view('apprenants.create',['listeApprenants' => $listeApprenants->find($id)]);
    }

    public function destroy(string $id)
    {
        $apprenant = new Apprenant();
        $apprenant->find($id)->delete();
        return to_route('students-list');
    }
}
