<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $guarded = ['id'];

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class, 'commentaire_reponse');
    }

    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'auteur_reponse');
    }

    //


}
