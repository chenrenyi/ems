<?php namespace App\Http\Middleware;

use Closure;
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
			return redirect('weixin/auth/'.base64_encode($request->url()));	
		}
		
		return $next($request);
	}

}
