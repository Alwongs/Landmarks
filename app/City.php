<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class City extends Model
{
    // Mass assigned
    protected $fillable = ['country_id', 'title', 'slug', 'created_by', 'modified_by'];

    // Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . '-' . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }


    public function places()
    {
        return $this->hasMany('App\Place');
    }

    public function scopeLastCities($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
