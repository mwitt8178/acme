<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\PasswordResets;

class AuthenticateResetToken {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$token = $request->segment(4);

		$token_authenticated = PasswordResets::where('token', $token)->first();

		if(empty($token_authenticated)){
			return redirect('/')->withErrors(['Failed to authenticate reset password token.  Please try again.']);
		}

		return $next($request);
	}

}
