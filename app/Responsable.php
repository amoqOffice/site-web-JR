<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $guarded = ['id'];

    public function enseignements()
    {
        return $this->belongsToMany(Enseignement::class, 'responsable_enseignement');
    }

    public function temples()
    {
        return $this->belongsToMany(Temple::class, 'responsable_temple');
    }

    public function cultes()
    {
        return $this->belongsToMany(Culte::class, 'responsable_culte');
    }

    //




}
