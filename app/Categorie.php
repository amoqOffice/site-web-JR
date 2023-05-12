<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded = ['id'];

    public function redactions()
    {
        return $this->belongsToMany(Redaction::class, 'redaction_categorie');
    }
    
    //
}
