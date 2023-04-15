<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temple extends Model
{
    protected $guarded = ['id'];

    public function responsables()
    {
        return $this->belongsToMany(Responsable::class, 'responsable_temple');
    }

    public function cultes()
    {
        return $this->hasMany(Culte::class);
    }

    public function activites()
    {
        return $this->hasMany(Activite::class);
    }

    //



}
