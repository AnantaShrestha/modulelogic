<?php
namespace Modules\UserManagement\Http\Traits;
use Illuminate\Support\Str;
trait AdminrouteTrait{
	/**
	 * @return get all list of routes
	 */
	public function routeCollection(){
		return get_routes_collection();
	} 

	/**
	 * @return make a route list 
	 */
	public function routeList(){
		$routes=$this->routeCollection();
		return $this->filterRoutes($routes);
	}

	/**
	 * @return filter routes
	 */
	public function filterRoutes($routes){
		$adminRoutes;
		$childRoutes;
		foreach($routes as $route){
			if (Str::startsWith($route->uri(), BACKEND_TEMPLATE_PREFIX )) {
				$prefix = BACKEND_TEMPLATE_PREFIX ? $route->getPrefix() : ltrim($route->getPrefix(),'/');
				$prefixArr=explode('/',$prefix);
				$module=end($prefixArr);
				switch ($length=sizeof($prefixArr)) {
					case $length>=2:
						$adminRoutes[$module] =[
							'all'=>$prefix . '/*',
							'view'=>$prefix
						];
						break;
					
					default:
						$adminRoutes[$module]=[
							'full-control'=>$prefix . '/*',
						];
					break;
				}
				foreach ($route->methods as $key => $method) {
					if ($method != 'HEAD' && !collect($this->without())->first(function ($exp) use ($route) {
						return Str::startsWith($route->uri, $exp);
					})) {
						$urlArr=explode('/',$route->uri);
						if(!empty($urlArr) && isset($urlArr[1]) && isset($urlArr[2])){
							$childRoutes[$urlArr[1]][$urlArr[2]]=$route->uri;
						}
					}
				}
			}

		}
		return array_merge_recursive($adminRoutes,$childRoutes);
	}
	public function without()
    {
        $prefix = BACKEND_TEMPLATE_PREFIX ? BACKEND_TEMPLATE_PREFIX.'/' : '';
        return [
        	$prefix.'login',
        	$prefix.'logout',
            $prefix.'dashboard',
            $prefix.'menu/sort'
        ];
    }
}