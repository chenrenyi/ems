<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Student;
use Weixin, Input;

class StudentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function anyIndex()
	{
		$students = Student::orderBy('id', 'desc')->get();
		return view('admin.student')->withStudents($students);
	}

	public function anyUpdate($type, $id) {
		$student = Student::find($id);
		if($type == 'name') {
			$student->name = Input::get('val');
		} elseif($type == 'number') {
			$student->number = Input::get('val');
		}
		$student->save();
	}

}
