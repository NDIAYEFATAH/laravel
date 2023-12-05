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
}
