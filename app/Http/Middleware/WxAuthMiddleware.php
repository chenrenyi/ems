<?php namespace App\Http\Middleware;

use Closure;
use Weixin;
use Session;
use Redirect;

class WxAuthMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!Session::get('openid', null)) {
			return Redirect::to('weixin/auth');
        }
		return $next($request);
	}

}
