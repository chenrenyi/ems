<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Student, App\Message;
use Weixin, Input, Session, Redirect;

class WeChatController extends Controller {

	protected $weixin;

	public function __construct()
	{
		$this->weixin = Weixin::sigleton();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $auth = Weixin::app('auth');
        var_dump($auth->user());
	}

    public function getSend()
    {
        $message = $this->weixin->makeMsg('text', 'hello everyone');
        echo $this->weixin->send($message);
    }

	public function getTest()
	{
		return view('test');
	}

    public function anyServe()
    {
        $weixin = Weixin::app('serve');

		//处理用户消息
        $weixin->on('message', function($message){
			$msg = new Message;
			$msg->userid = Student::where('wid', '=', $message->FromUserName)->first()->id;
			$msg->type = $message->MsgType;

			if($msg->type == 'text') {
				$content = $message->Content;
			} elseif ($msg->type == 'image') {
				$content = $message->PicUrl;
			} else {
				return '暂时只支持接收文字和图片消息';
			}

			$msg->content = $content;
			$msg->save();
            return '老师已收到问题或者反馈，若有必要可能会回复';
        });

		//处理微信事件
        $weixin->on('event', function($event){
            $openid = $event['FromUserName'];
            $student = Student::where('wid', '=', $openid)->first();
            if(empty($student)) {
				$userService = Weixin::app('user');
            	$user = $userService->get($openid);
                $student = new Student;
                $student->wid = $openid;
                $student->name = $user->nickname;
                $student->head = $user->headimgurl;
                $student->save();
            }

             return Weixin::makeMsg('text', '感谢关注，请务必先<a href="http://em.chenrenyi.cn/weixin/bindinfo">绑定学号姓名</a>');
        });

        echo $weixin->serve();
    }

	public function anyAuth($url)
	{
		$auth = Weixin::app('auth');
		if(!Session::get('openid', null)) {
			$user = $auth->authorize();
			Session::put('openid', $user['openid']);
		}
		return Redirect::to(base64_decode($url));
	}

    public function getBindinfo()
    {
        $student = Student::where('wid', '=', Session::get('openid'))->firstOrFail();
		$name = $student->name;
		$number = $student->number;
		if(empty($name) || empty($number)) {
			return view('weixin.bindinfo');
		}
		return view('weixin.msg')->withMsg('已经绑定过了')->withContent('学号：'.$number.'      姓名：'.$name);
    }

    public function anySaveinfo(Request $request)
    {
        $student = Student::where('wid', '=', Session::get('openid'))->firstOrFail();
        $student->name = Input::get('name');
        $student->number = Input::get('number');
        if($student->save()) {
            return view('weixin.msg')->withMsg('保存成功');
        } else {
            return Redirect::back()->withInput()->withError('保存失败');
        }

    }

}

?>
