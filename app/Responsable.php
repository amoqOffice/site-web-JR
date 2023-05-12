<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $guarded = ['id'];

    public function temples()
    {
        return $this->belongsToMany(Temple::class, 'responsable_temple');
    }

    public function cultes()
    {
        return $this->belongsToMany(Culte::class, 'responsable_culte');
    }

    public function redactions()
    {
        return $this->belongsToMany(Redaction::class, 'redaction_responsable');
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_responsable');
    }

    public function emissions()
    {
        return $this->belongsToMany(Emission::class, 'responsable_emission');
    }

    public function activites()
    {
        return $this->belongsToMany(Activite::class, 'activite_responsable');
    }

    //








}
