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
        Weixin::app()->serve();
    }

}

?>
