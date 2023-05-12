<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $guarded = ['id'];

    public function temple()
    {
        return $this->belongsTo(Temple::class);
    }

    public function responsables()
    {
        return $this->belongsToMany(Responsable::class, 'activite_responsable');
    }

    //



}
