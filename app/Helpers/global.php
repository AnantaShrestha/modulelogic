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