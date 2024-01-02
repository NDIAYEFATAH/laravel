<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\Matiere;
use App\Models\Note;
use Illuminate\Http\Request;

class noteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $note = Note::all();
        return view('listeNote',['note' => $note,
            'matiere' => Matiere::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $note = new Note();
        return view('addNote',['note' => $note,
            'matiere' => Matiere::all(),
            'apprenant' => Apprenant::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'devoirs' => 'required|numeric|between:0,20',
            'examen' => 'required|numeric|between:0,20',
            'matiere_id' => 'required',
            'apprenant_id' => 'required'
        ]);
        Note::create($request->all());

        return to_route('listeNote.index')->with("success", "Note ajoutee avec succes");
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
        $note = new Note();
        return view('addNote',['note' => $note->find($id),
            'matiere' => Matiere::all(),
            'apprenant' => Apprenant::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $note)
    {
        $request->validate([
            'devoirs' => 'required|numeric|between:0,20',
            'examen' => 'required|numeric|between:0,20',
            'matiere_id' => 'required',
            'apprenant_id' => 'required'
        ]);
        Note::find($note)->update($request->all());

        return to_route('listeNote.index')->with("success", "Note modifiee avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::destroy($id);
        return to_route('listeNote.index');
    }
}
