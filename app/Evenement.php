<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $guarded = ['id'];

    public function temple()
    {
        return $this->belongsTo(Temple::class, 'temple_evenement');
    }

    //

}
