<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emission extends Model
{
    protected $guarded = ['id'];

    public function responsables()
    {
        return $this->belongsToMany(Responsable::class, 'responsable_emission');
    }

    //

}
