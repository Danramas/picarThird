<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table='marks';

    public function samples()
    {
        return $this->hasMany(Sample::class);
    }
}
