<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['devoirs','examen','matiere_id','apprenant_id'];

    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
