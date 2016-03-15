<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Weixin;

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

        echo $weixin->serve();
    }

}

?>
