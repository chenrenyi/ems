<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Student;
use Weixin, Input, Session;

class WeChatController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $auth = Weixin::app('auth');
        $var_dump($auth->user());
	}

    public function getSend()
    {
        $weixin = Weixin::sigleton();
        $message = $weixin->makeMsg('text', 'hello everyone');
        echo $weixin->send($message);
    }

    public function anyServe()
    {
        $weixin = Weixin::app('serve');

        $weixin->on('message', function($message){
             return 'developing.... by chenrenyi';
        });

        $weixin->on('event', 'subscribe', function($event){
            $openid = $event['FromUserName'];
            $student = Student::where('wid', '=', $openid)->first();
            if(empty($student)) {
                $student = new Student;
                $student->wid = $openid;
                $student->save();
            }

             return Message::make('text')->content('感谢关注，请务必先<a href="http://em.chenrenyi.cn/weixin/bindinfo">绑定学号姓名</a>');
        });

        echo $weixin->serve();
    }

    public function getBindinfo()
    {
         return view('weixin.bindinfo');
    }

    public function postSaveInfo(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required',
        ]);

        $student = Student::where('wid', '=', Session::get('openid'))->firstOrFail();
        $student->name = Input::get('name');
        $student->number = Input::get('number');
        if($student->save()) {
             Return Redirect::to('weixin.savedone');
        } else {
            return Redirect::back()->withInput()->withError('保存失败');
        }

    }

}

?>
