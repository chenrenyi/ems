<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	public function student() {
		return $this->belongsTo('App\Student', 'userid');
	}

	public function reply() {
		return $this->hasOne('App\Reply');
	}

}
