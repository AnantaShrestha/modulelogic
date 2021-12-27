<?php
namespace Modules\UserManagement\Http\UsermanagementViewComposer;
use Illuminate\View\View;
use Modules\Usermanagement\Entities\User;
class UserComposer{
	public function	compose	(View $view){
		$users=User::orderBy('created_at','desc')->get();
		return $view->with('users',$users);
	}
}
