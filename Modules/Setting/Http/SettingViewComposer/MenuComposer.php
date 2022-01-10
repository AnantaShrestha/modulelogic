<?php
namespace Modules\Setting\Http\SettingViewComposer;
use Modules\Setting\Repository\MenuRepo\MenuRepo;
use Illuminate\View\View;
class MenuComposer{
	private $menuRepo;
	public function __construct(MenuRepo $menuRepo){
		$this->menuRepo=$menuRepo;
	}
	public function	compose	(View $view){
		$menus=$this->menuRepo->getListMenu()->groupBy('parent_id');
		return $view->with('menus',$menus);
	}
}
