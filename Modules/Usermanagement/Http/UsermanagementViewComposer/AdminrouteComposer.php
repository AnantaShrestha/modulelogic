<?php
namespace Modules\UserManagement\Http\UsermanagementViewComposer;
use Modules\Usermanagement\Http\Traits\AdminrouteTrait;
use Illuminate\View\View;
class AdminrouteComposer{
	use AdminrouteTrait;
	public function	compose	(View $view){
		$routeList=$this->routeList();
		return $view->with('routeList',$routeList);
	}
}
