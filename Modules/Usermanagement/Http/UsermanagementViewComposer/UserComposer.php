<?php
namespace Modules\UserManagement\Http\UsermanagementViewComposer;
use Modules\Usermanagement\Repository\UserRepo\UserRepo;
use Illuminate\View\View;
use Modules\Usermanagement\Entities\User;
class UserComposer{
	private $userRepo;
	public function __construct(UserRepo $userRepo){
		$this->userRepo=$userRepo
	}
	public function	compose	(View $view){
		$users=$this->userRepo->getUserList();
		return $view->with('users',$users);
	}
}
