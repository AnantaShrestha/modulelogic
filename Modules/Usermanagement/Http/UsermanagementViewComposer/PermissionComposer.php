<?php
namespace Modules\UserManagement\Http\UsermanagementViewComposer;
use Modules\Usermanagement\Repository\PermissionRepo\PermissionRepo;
use Illuminate\View\View;
class PermissionComposer{
	private $permissionRepo;
	public function __construct(PermissionRepo $permissionRepo){
		$this->permissionRepo=$permissionRepo;
	}
	public function	compose	(View $view){
		$permissions=$this->permissionRepo->getPermissionList();
		return $view->with('permissions',$permissions);
	}
}
