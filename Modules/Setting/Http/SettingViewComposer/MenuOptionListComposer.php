<?php
namespace Modules\Setting\Http\SettingViewComposer;
use Modules\Setting\Repository\MenuRepo\MenuRepo;
use Illuminate\View\View;
class MenuOptionListComposer{
	private $menuRepo;
	public function __construct(MenuRepo $menuRepo){
		$this->menuRepo=$menuRepo;
	}
	public function	compose	(View $view){
		$optionListMenu=$this->menuRepo->getTreeMenu();
		return $view->with('optionListMenu',$optionListMenu);
	}
}
