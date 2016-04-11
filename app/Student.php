<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	public function classes() {
		return $this->belongsTo('App\Classes', 'classid');
	}

	public function score() {
		if(empty(Score::where('sid', '=', $this->id)->get())) {
			$score = new Score;
			$score->sid = $this->id;
			$score->save();
		}
		return $this->hasOne('App\Score', 'sid');
	}

}
