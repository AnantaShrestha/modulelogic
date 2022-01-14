<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Modules\Setting\Entities\LogActivity;
class LogActivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $response=$next($request);
            if(Auth::guard(BACKEND_GUARD)->check() && $request->method()!='GET'){
                if($request->ajax()){
                    $output=json_decode($response->getContent(),true) ?? '';
                }else{
                    $output=$request->session()->get('message');
                }
                $this->createLog($request,$output);
            }else if(Auth::guard(BACKEND_GUARD)->check() && isset($response->exception) && $response->exception){
                $output=$response->exception->getMessage();
                $file=$response->exception->getFile();
                $line=$response->exception->getLine();
                $this->createLog($request,$output);
                return redirect()->route('admin.error')->with(['errorMessage'=>$output,'line'=>$line,'file'=>$file]);
            }
            return $response;
        } catch (Exception $e) {
            return redirect()->route('admin.error')->with(['errorMessage'=>$e->getMessage(),'line'=>$line,'file'=>$file]);
        }
       
    }


    protected function createLog($request,$output){
        $data=[
            'user_id'=>Auth::guard(BACKEND_GUARD)->user()->id,
            'path'=>$request->path(),
            'ip'=>$request->getClientIp(),
            'method'=>$request->method(),
            'user_agent'=>$request->header('User-Agent'),
            'input'=>json_encode($request->input()),
            'output'=>$output,
        ];
        return LogActivity::create($data);
    }

    protected function without(){
        $prefix=BACKEND_TEMPLATE_PREFIX;
        return [

        ];
    }
}
