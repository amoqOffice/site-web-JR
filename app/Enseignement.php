<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignement extends Model
{
    protected $guarded = ['id'];

    public function responsables()
    {
        return $this->belongsToMany(Responsable::class, 'responsable_enseignement');
    }

    public function rubriques()
    {
        return $this->belongsToMany(Rubrique::class, 'rubrique_enseignement');
    }

    //



}
