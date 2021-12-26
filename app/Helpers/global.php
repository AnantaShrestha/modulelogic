<?php

if(!function_exists('getCurrentUrl')){
	function getCurrentUrl(){
		return url()->current();
	}
}
if(!function_exists('urlArr'))
{
	function urlArr(){
		$currentUrl=getCurrentUrl();
		return explode('/',$currentUrl);
	}

}
if(!function_exists('breadCrum')){
	function breadCrum(){
		$urlArr=urlArr();
		$breadCrum=[];
		if(isset($urlArr[4])){
			$breadCrum[]=ucfirst($urlArr[4]);
		}
		if(isset($urlArr[5])){
			$breadCrum[]=ucfirst($urlArr[5]);
		}
		return $breadCrum;
	}
}

if(!function_exists('get_routes_collection')){
	function get_routes_collection(){
		$routes=\Route::getRoutes()->getRoutesByMethod();
		return array_merge($routes['GET'],$routes['POST'],$routes['DELETE']);
	}
}
if(!function_exists('edit_icon')){
	function edit_icon(){
		return '<i class="fa fa-edit"></i>';
	}
}
if(!function_exists('delete_icon')){
	function delete_icon(){
		return '<i class="fa fa-trash"></i>';
	}
}