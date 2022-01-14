
<div id="sidebar" class="sidebar">
		<div class="profile-wrapper">
			<div class="profile-image"><img src="/backend/images/user.png"></div>
			<div class="profile-name">
				<h1>Admin Dashboard</h1>
			</div>
		</div>
		<aside>
			<ul class='parent-navigation'>
				@if($menus[0])
					@foreach($menus[0] as $menu)
						<li class="navigation-item {{isset($menus[$menu->id]) && count($menus[$menu->id]) ? 'has-children' : ''}}">
							<div class="navigation-wrapper">
								<span class='nav-icon'><i class="{{$menu->icon}}"></i></span>
								<a href="{{$menu->uri ? (url($menu->uri)) : 'javescript:;'  }}" class="navigation-link">{{$menu->title}} {!! isset($menus[$menu->id]) && count($menus[$menu->id]) ? '<i class="drop-down-chervon fa fa-chevron-down"></i>' : '' !!}</a>
							</div>
							 @if(isset($menus[$menu->id]) && count($menus[$menu->id]))
							 	@include('backend.layouts.includes.sidebarSubMenu',['menu'=>$menu])
							 @endif
						</li>
					@endforeach
				
				@endif
			</ul>
		</aside>
	</div>