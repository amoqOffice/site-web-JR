<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $guarded = ['id'];

    public function redaction()
    {
        return $this->belongsTo(Redaction::class, 'redaction_commentaire');
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class, 'commentaire_reponse');
    }

    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'auteur_commentaire');
    }

    //



}
