<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class PermissionMiddleWare
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
        $user=Auth::guard(BACKEND_GUARD)->user();
        if (Auth::guard(BACKEND_GUARD)->guest() && !$this->shouldPassThrough($request)) {
            return redirect()->guest(route('admin.login'));
        }
        if (!empty($args) || $this->shouldPassThrough($request) || $user->isAdministrator()){
            return $next($request);
        }
        // Allow access route
        if ($this->routeDefaultPass($request)) {
             return $next($request);

        }
        if($user->checkUrlAllowAccess($request->url())){
             return $next($request);
        }
        if (!$user->allPermissions()->first(function ($modelPermission){
            return $modelPermission->passRequest();
        })) {  
            if (!request()->ajax()) {
                return redirect()->route('admin.permission.denied');
            } else {
                return $this->error();
            }
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
            BACKEND_TEMPLATE_PREFIX.'/login',
            BACKEND_TEMPLATE_PREFIX.'/logout',
        ];
        return in_array($routePath, $exceptsPAth);
    }

     /*
    Check route defualt allow access
    */
    public function routeDefaultPass($request)
    {
        $routeName = $request->route()->getName();
        $allowRoute = ['admin.dashboard','admin.permission.denied'];
        return in_array($routeName, $allowRoute);
    }


    /**
     * @return error
     */
    public function error()
    {
        $uriCurrent = request()->fullUrl();
        $methodCurrent = request()->method();
        if (strtoupper($methodCurrent) === 'GET') {
            return redirect()->route('admin.deny');
        } else {
            return response()->json([
                'type' => 'error',
                'message' => 'Permission Denied',
                'detail' => [
                    'url' => $uriCurrent
                ]
            ],403);
        }
    }


}
