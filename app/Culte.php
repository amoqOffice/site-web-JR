<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Culte extends Model
{
    protected $guarded = ['id'];

    public function responsables()
    {
        return $this->belongsToMany(Responsable::class, 'responsable_culte');
    }

    public function temple()
    {
        return $this->belongsTo(Temple::class);
    }

    //



}
