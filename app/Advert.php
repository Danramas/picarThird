<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    public function comments()
    {

        return $this->hasMany(Comment::class);
    }

    public function modification()
    {

        return $this->belongsTo(Modification::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name'=>'Unknown author']);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class);
    }

    protected $fillable = [
        'modification_id', 'user_id', 'year', 'image1', 'image2', 'image3', 'image4', 'image5',
    ];
}
