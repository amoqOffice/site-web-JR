<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $guarded = ['id'];

    public function temples()
    {
        return $this->hasMany(Temple::class, 'pays_temple');
    }

    public function responsables()
    {
        return $this->hasMany(Responsable::class, 'pays_responsable');
    }

    //


}
