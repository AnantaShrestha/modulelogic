<?php
namespace Modules\Setting\Http\SettingViewComposer;
use Modules\Setting\Repository\MenuRepo\MenuRepo;
use Illuminate\View\View;
class MenuComposer{
	public function	compose	(View $view){
		$menus= \Auth::guard('admin')->user()->isAdministrator() ? (new MenuRepo)->getListMenu()->groupBy('parent_id') : (new MenuRepo)->getListVisible();
		return $view->with('menus',$menus);
	}
}
