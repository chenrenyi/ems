<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model {

	public function studentNumber() {
		return Student::where('classid', '=', $this->id)->count();
	}

}
