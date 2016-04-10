<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	public function classes() {
		return $this->belongsTo('App\Classes', 'classid');
	}

	public function score() {
		return $this->hasOne('App\Score', 'sid');
	}

}
