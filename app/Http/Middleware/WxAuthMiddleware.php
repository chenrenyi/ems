<?php namespace App\Http\Middleware;

use Closure;
use Weixin;
use Session;

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
            $auth = Weixin::app('auth');
            $user = $auth->authorize('http://em.chenrenyi.cn');
            Session::put('openid', $user['openid']);
        }
		return $next($request);
	}

}
