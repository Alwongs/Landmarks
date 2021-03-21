<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    // Mass assigned
    protected $fillable = ['place_id', 'title', 'path', 'created_by', 'modified_by'];

    public function place()
    {
        return $this->belongsTo('App\Place');
    }


    public function scopeLastPictures($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
