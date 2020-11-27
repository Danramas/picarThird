<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = ['file'];

    public static function create(array $array)
    {
    }

    public static function where(string $string, $id)
    {
    }
}
