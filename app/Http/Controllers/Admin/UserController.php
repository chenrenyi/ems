<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth, Input, Hash, Redirect;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function anyIndex()
	{
		return view('admin.user');
	}

	public function anyUpdate() {
		$user = Auth::user();
		if(Input::get('new_password') == Input::get('re_password')) {		//如果新密码和确认密码相同
			if (Auth::attempt(['email' => $user->email, 'password' => Input::get('old_password')])) {	//如果原始密码正确
				$user->password = Hash::make(Input::get('new_password'));
				$user->save();
				Auth::logout();
				return Redirect::to('/auth/login');
			}
			return view('admin.user')->withError('原密码输入错误');
		}
		return view('admin.user')->withError('新密码和确认密码不一致');
	}

}
