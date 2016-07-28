<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post() {
    	return $this->belongsTo('App\Post');
    }

    public function getCreatedAtAttribute($date) {
    	return Date::parse($date)->format('l j F Y');
   	}
}
