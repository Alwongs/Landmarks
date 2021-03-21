<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Mass assigned
    protected $fillable = ['place_id', 'description', 'created_by', 'modified_by'];

    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function scopeLastComments($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
