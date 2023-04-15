<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    protected $guarded = ['id'];

    public function enseignements()
    {
        return $this->belongsToMany(Enseignement::class, 'rubrique_enseignement');
    }

    public function subheadings()
    {
        return $this->hasMany(Subheading::class);
    }

    //


}
