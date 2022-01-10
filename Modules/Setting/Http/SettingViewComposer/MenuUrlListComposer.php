<?php
namespace Modules\Setting\Http\SettingViewComposer;
use Illuminate\View\View;
use Modules\Setting\Http\Traits\MenuroutelistTrait;
class MenuUrlListComposer{
	use MenuroutelistTrait;
	public function	compose	(View $view){
		$urlList=$this->routeList();
		return $view->with('urlList',$urlList);
	}
}
