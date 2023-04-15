<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subheading extends Model
{
    protected $guarded = ['id'];

    public function rubrique()
    {
        return $this->belongsTo(Rubrique::class);
    }

    //

}
