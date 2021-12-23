<?php	
	$old_access_uri = old('access_uri',(isset($permission)) ? explode(',', $permission->http_uri) : []);
?>
@foreach($routeList as $key=>$routes)
	<div class="permission-item">
		<div class="permission-title">
			<h3>{{ucfirst($key)}}</h3>
		</div>
		<div class="permission-list">
			<ul>
				@foreach($routes as $keyTwo=>$route)
					@if($key!='root_uri')
						<li>{!!Form::checkbox('access_uri[]',$route,(in_array($route,$old_access_uri)) ? true : false) !!}
							<span>
								@switch($keyTwo)
									@case('full-control')
										{{str_replace('-',' ',ucfirst($keyTwo))}}
										@break
									@case('all')
										{{ucfirst($keyTwo)}}
										@break
									@default
										{{ucfirst($key).' '.ucfirst($keyTwo)}}
								@endswitch
							</span>
						</li>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
@endforeach