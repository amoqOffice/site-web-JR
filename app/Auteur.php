<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $guarded = ['id'];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'auteur_commentaire');
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class, 'auteur_reponse');
    }

    //


}
