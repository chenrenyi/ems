<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model {

	public function classes() {
		return $this->belongsTo('App\Classes', 'classid');
	}

	public function sectionToString() {
		$weekoparr = ['每周', '单周', '双周'];
		$weekdayarr = ['周一', '周二', '周三', '周四', '周五', '周六', '周日'];

		$string = $this->weekstart . '-' . $this->weekend . '周， ';
		$string .= $weekoparr[$this->weekop];

		$sections = json_decode($this->section);
		foreach($sections as $val) {
			$string .= '，';
			$string .= $weekdayarr[$val->day];
			$string .= ' ';
			$string .= $val->start . '-' . $val->end . '节';
		}
		return $string;
	}


	public function sourceData() {
		$data = [
			'id' => $this->id,
			'name' => $this->name,
			'classid' => $this->classid,
			'weekstart' => $this->weekstart,
			'weekend' => $this->weekend,
			'weekop' => $this->weekop,
			'section' => $this->section,
		];
		return json_encode($data);
	}

}
