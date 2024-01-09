<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;
    protected $fillable = ["nom","prenom","matricule","telephone"];


    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
