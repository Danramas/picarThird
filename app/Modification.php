<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

    protected $table='modifications';
}
