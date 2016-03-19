<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Message, App\Reply;
use Weixin, Input;

class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function anyIndex()
	{
		$data = [];
		$messages = Message::orderBy('created_at', 'desc')->paginate(10);
		$paginatehtml = $messages->render();
		foreach($messages as $msg) {
			$tmp = [];
			$tmp['id'] = $msg->id;
			$tmp['name'] = $msg->student->name;
			$tmp['head'] = $msg->student->head;
			$tmp['type'] = $msg->type;
			$tmp['content'] = $msg->content;
			$tmp['time'] = Weixin::formatTime($msg->created_at);
			if($msg->reply) {
				$tmp['reply'] = $msg->reply->content;
				$tmp['reply_time'] = Weixin::formatTime($msg->reply->created_at);
			}
			$data[] = $tmp;
		}
		return view('admin.message')->withMessages($data)->withPaginate($paginatehtml);
	}

	public function postReply() {
		$reply = new Reply;
		$reply->message_id = Input::get('id');
		$reply->content = Input::get('content');

		if($reply->save()) {
			$staff = Weixin::app('staff');
			$message =  Weixin::sigleton()->makeMsg('text', $reply->content);
			$staff->send($message)->to($reply->message->student->wid);
			return 0;
		}

		return 1;
	}

}
