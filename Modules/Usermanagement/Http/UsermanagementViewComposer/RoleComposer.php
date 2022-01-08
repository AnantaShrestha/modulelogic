<?php
namespace Modules\UserManagement\Http\UsermanagementViewComposer;
use Modules\Usermanagement\Repository\RoleRepo\RoleRepo;
use Illuminate\View\View;
use Modules\Usermanagement\Entities\Role;
class RoleComposer{
	private $roleRepo;
	public function __construct(RoleRepo $roleRepo){
		$this->roleRepo=$roleRepo;
	}
	public function	compose	(View $view){
		$roles=$this->roleRepo->getRoleList();
		return $view->with('roles',$roles);
	}
}
