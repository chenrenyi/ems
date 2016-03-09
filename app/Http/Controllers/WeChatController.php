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
        Weixin::test();
	}

    public function anyServe()
    {
        $weixin = Weixin::app();
        echo $weixin->serve();

        $weixin->on('message', function($message){
             return '这是毕设的测试账号，相关功能正在紧张开发中，敬请期待！';
        });
    }

}

?>
