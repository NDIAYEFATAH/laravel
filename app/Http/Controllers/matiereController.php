<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class matiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listeMatiere = Matiere::all();
        return view("matiere/listematiere",["listeMat" => $listeMatiere]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listeMatiere = new Matiere();
        return view('matiere.creatematter',['listeMat' => $listeMatiere]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'libelle' => 'required',
           'coef' => 'required',
        ]);

        Matiere::create($request->all());
        return to_route('list_mat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listeMatiere = new Matiere();
        return view('matiere.creatematter',['listeMat' => $listeMatiere->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle' => 'required',
            'coef' => 'required',
        ]);

        Matiere::find($id)->update($request->all());
        return to_route('list_mat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matiere = new  Matiere();
        $matiere->find($id)->delete();
        return to_route('list_mat');
    }
}
