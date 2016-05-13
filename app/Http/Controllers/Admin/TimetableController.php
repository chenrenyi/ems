<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Classes, App\Student, App\Timetable;
use Weixin, Input, Redirect;

class TimetableController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function anyIndex()
	{
		$timetables = Timetable::all();
		$classes = Classes::all();
		return view('admin.timetable')->withClasses($classes)->withTimetables($timetables);
	}

	public function postAdd() {
		$timetable = new Timetable;
		$this->doChange($timetable);
		return Redirect::back();
	}

	public function postEdit() {
		$timetable = Timetable::find(Input::get('id'));
		$this->doChange($timetable);
		return Redirect::back();
	}

	public function doChange($timetable) {
		$timetable->classid = Input::get('classid');
		$timetable->name = Input::get('name');
		$timetable->weekstart = Input::get('weekstart');
		$timetable->weekend = Input::get('weekend');
		$timetable->weekop = Input::get('weekop');

		$section_start = Input::get('section-start');
		$section_end = Input::get('section-end');
		$weekday = Input::get('weekday');
		$sections = [];

		for($i = 0; $i < count($weekday); $i++) {
			$sections[] = [
				'start' => $section_start[$i],
				'end' => $section_end[$i],
				'day' => $weekday[$i],
			];
		}

		$timetable->section = json_encode($sections);
		$timetable->save();
	}

	public function postDelete() {
		$timetable = Timetable::find(Input::get('id'));
		$timetable->delete();
		return Redirect::back();
	}



}
