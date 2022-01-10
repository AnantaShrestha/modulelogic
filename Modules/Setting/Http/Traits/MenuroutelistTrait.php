<?php
namespace Modules\Setting\Http\Traits;

trait MenuroutelistTrait{
	public function routeCollection(){
		return get_routes_collection();
	}

	public function routeList(){
		$routes=$this->routeCollection();
		return $this->filterRoute($routes);
	}

	public function filterRoute($routes){
		$routeList;
		foreach($routes as $route){
			if (\Str::startsWith($route->uri(), BACKEND_TEMPLATE_PREFIX )) {
				foreach ($route->methods as $key => $method) {
					if ($method != 'HEAD' && !collect($this->without())->first(function ($exp) use ($route) {
						return \Str::startsWith($route->uri, $exp);
					})) {
						$routeList[$route->uri]=$route->uri;
					}
				}
			}
		}
		return $routeList;
	}


	public function without()
    {
        $prefix = BACKEND_TEMPLATE_PREFIX ? BACKEND_TEMPLATE_PREFIX.'/' : '';
        return [
        	$prefix.'login',
        	$prefix.'logout',
        	
            $prefix.'permission/pagination',
            $prefix.'permission/edit/{id}',
            $prefix.'permission/delete',

            $prefix.'role/pagination',
            $prefix.'role/edit/{id}',
            $prefix.'role/delete',

            $prefix.'user/pagination',
            $prefix.'user/edit/{id}',
            $prefix.'user/delete',
            
            $prefix.'menu/edit/{id}',
            $prefix.'menu/delete',
            $prefix.'menu/sort',

        ];
    }

}