<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Student, App\Settings;
use Weixin, Input;

class ScoreController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function anyIndex()
	{
		$ispublish = Settings::find(1)->val;
		$students = Student::all();
		return view('admin.score')->withStudents($students)->withIspublish($ispublish);
	}

	public function postUpdate() {
		$score = Student::find(Input::get('studentid'))->score;
		$id = Input::get('scoreid');
		if($id == 1) {
			$score->score1 = Input::get('val');
		}
		if($id == 2) {
			$score->score2 = Input::get('val');
		}
		if($id == 3) {
			$score->score3 = Input::get('val');
		}
		if($id == 4) {
			$score->score4 = Input::get('val');
		}
		$score->scoresum = $score->score1 + $score->score2 + $score->score13 + $score->score4;
		$score->save();

	}

	public function postPublish() {
		$ispublish = Settings::find(1);
		$ispublish->val = 1 - $ispublish->val;
		$ispublish->save();
	}

}
