<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/6
 * Time: 下午2:19
 */

namespace App\Http\Middleware;


use Illuminate\Contracts\Auth\Guard;
use Closure;

class WebAuth
{
    protected $except = [
        '/home/login',
    ];

    public $auth;

    /**
     * Creates a new instance of the middleware.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->inExceptArray($request)) {
            return $next($request);
        }
        if ($this->auth->guest()) {
            return redirect('home/login');
        }

        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }

    protected function abortError($request, $code, $msg)
    {
        if ($request->expectsJson()) {
            return admin_ajax_response('301', $msg);
        } else {
            if ($code == 403) {
                return redirect()->route('admin.login.form');
            } else {
                abort($code, $msg);
            }
        }
    }
}