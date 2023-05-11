<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redaction extends Model
{
    protected $guarded = ['id'];

    public function commentaires()
    {
        return $this->hasMany(Redaction::class, 'redaction_commentaire');
    }

    public function categories()
    {
        return $this->belongsToMany(Redaction::class, 'redaction_commentaire');
    }

    public function responsables()
    {
        return $this->belongsToMany(Responsable::class, 'redaction_responsable');
    }

    public function temple()
    {
        return $this->belongsTo(Temple::class, 'temple_redaction');
    }

    //

}
