<ul class="navigation-dropdown">
	@foreach($menus[$menu->id] as $menu)
	<li class="navigation-item {{isset($menus[$menu->id]) && count($menus[$menu->id]) ? 'has-children' : ''}}">
		<div class="navigation-wrapper">
			<a href="{{$menu->uri ? (url($menu->uri)) : 'javascript'  }}" class="navigation-link">{{$menu->title}}{!! isset($menus[$menu->id]) && count($menus[$menu->id]) ? '<i class="drop-down-chervon fa fa-chevron-down"></i>' : '' !!}</a>
		</div>
		 @if(isset($menus[$menu->id]) && count($menus[$menu->id]))
			@include('backend.layouts.includes.sidebarSubMenu',['menu'=>$menu])
		@endif
	</li>
	@endforeach
</ul>