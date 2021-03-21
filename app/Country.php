<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Country extends Model
{
    // Mass assigned
    protected $fillable = ['title', 'slug', 'published', 'created_by', 'modified_by'];

    // Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . '-' . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function scopeLastCountries($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
