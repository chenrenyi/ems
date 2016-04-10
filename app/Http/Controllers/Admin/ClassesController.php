<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Classes, App\Student;
use Weixin, Input, Redirect;

class ClassesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function anyIndex()
	{
		$classid = Input::get('id', 1);
		$students = Student::where('classid', '=', $classid)->get();
		$classes = Classes::all();
		$currentClass = Classes::find($classid);
		return view('admin.classes')->withStudents($students)->withClasses($classes)->withCurrentclass($currentClass);
	}

	public function anyCreate() {
		$classes = new Classes;
		$classes->name = Input::get('name');
		$classes->gid = 0;
		$classes->save();
	}

	public function postDelete() {
		$id = Input::get('id');
		$cla = Classes::find($id);
		$cla->delete();
		return Redirect::to('/admin/classes');
	}

	public function postEdit() {
		$id = Input::get('id');
		$cla = Classes::find($id);
		$cla->name = Input::get('name');
		$cla->save();
	}

	public function postMove() {
		$studentid = Input::get('studentid');
		$classid = Input::get('classid');
		$student = Student::find($studentid);
		$student->classid = $classid;
		$student->save();
	}

}
