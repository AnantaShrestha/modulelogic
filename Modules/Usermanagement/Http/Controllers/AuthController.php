<?php

namespace Modules\Usermanagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function login()
    {
        if ($this->guard()->check()) {
            return redirect($this->redirectPath());
        }
        return view('usermanagement::auth.login');
    }

    public function loginProcess(Request $request){
        $this->loginValidator($request->all())->validate();
        $credentials = $request->only([$this->username(), 'password']);
        $remember = $request->get('remember', false);
        if ($this->guard()->attempt($credentials, $remember)) {
            return $this->sendLoginResponse($request);
        }
        return back()->withInput()->withErrors([
            $this->username() => $this->getFailedLoginMessage(),
        ]);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect(route('admin.login'));
    }

    protected function loginValidator(array $data)
    {
        return \Validator::make($data, [
            $this->username() ?? $this->email() => 'required',
            'password' => 'required',
        ]);
    }
    protected function getFailedLoginMessage()
    {
        return \Lang::has('auth.failed')
        ? trans('auth.failed')
        : 'These credentials do not match our records.';
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        return redirect()->intended($this->redirectPath())->with(['success' =>'Login Successfully']);
    }

    protected function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : route('admin.dashboard');
    }

    protected function username(){
        return 'username';
    }
    protected function email(){
        return 'email';
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }

}
