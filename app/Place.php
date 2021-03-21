<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Place extends Model
{
    // Mass assigned
    protected $fillable = ['city_id', 'title', 'slug', 'description', 'created_by', 'modified_by'];

    // Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . '-' . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

    public function scopeLastPlaces($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
