<?php

namespace Modules\Usermanagement\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $middlewarePrefix = 'admin.permission:';

    public function handle(Request $request, Closure $next,...$args)
    {
        if (Auth::guard('admin')->guest() && !$this->shouldPassThrough($request)) {
            return redirect()->guest(route('admin.login'));
        }
        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through verification.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        $routePath = $request->path();
        $exceptsPAth = [
            config('dashboard.BACKEND_TEMPLATE_PREFIX') . '/login',
            config('dashboard.BACKEND_TEMPLATE_PREFIX') . '/logout',
        ];
        return in_array($routePath, $exceptsPAth);
    }
}
