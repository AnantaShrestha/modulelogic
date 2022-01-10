@foreach($menus[0] as $menu)
	<li class="dd-item " data-id="{{ $menu->id }}">
		<div class="dd-handle header-fix " style="">
			{!! $menu->title !!}
			<span class="float-right dd-nodrag">
				<a class="menu-edit-btn" href="{{route('admin.menu.edit',['id'=>$menu->id])}}"><i class="fa fa-edit"></i></a>
				&nbsp; 
				<a class="menu-delete-btn" data-id="{{ $menu->id }}" ><i class="fa fa-trash"></i></a>
			</span>
		</div>
		 @if (isset($menus[$menu->id]) && count($menus[$menu->id]))
	      @include('setting::menu.includes.submenuListing',['menu'=>$menu])
	    @endif
	</li>
@endforeach