<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }

    public function modifications()
    {
        return $this->hasMany(Modification::class);
    }
    protected $table='samples';
}
