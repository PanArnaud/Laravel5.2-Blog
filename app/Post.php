<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }

    public function getCreatedAtAttribute($date) {
    	return Date::parse($date)->format('j F Y');
   	}
}
