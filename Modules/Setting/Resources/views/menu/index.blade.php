@extends('backend.layouts.default')
@section('content')
<div class="table-list-wrapper">
	<div class="list-action-wrapper">
		<div class="row-wrapper">
			<div class="other-action">
				<a class="create-btn" href="{{route('admin.menu.create')}}">Create</a>
			</div>
		</div>
	</div>
	<div class="menu-listing-wrapper">
		<div class="dd" id="menu-sort">
			<ol class="dd-list">
				@if($menus[0])
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
							<ol class="dd-list">
								  @foreach ($menus[$menu->id] as $level)
									  <li class="dd-item" data-id="{{ $level->id }}">
									    <div class="dd-handle">
									      {!! $level->title !!}
									      <span class="float-right dd-nodrag">
									        <a class="menu-edit-btn" href="{{route('admin.menu.edit',['id'=>$level->id])}}"><i class="fa fa-edit fa-edit"></i></a>
									        &nbsp; 
									        <a class="menu-delete-btn" data-id="{{ $level->id }}" class="remove_menu"><i class="fa fa-trash fa-edit"></i></a>
									      </span>
									    </div>
									    @if (isset($menus[$level->id]) && count($menus[$level->id]))

											<ol class="dd-list">
											  @foreach ($menus[$level->id] as $levelTwo)
											  <li class="dd-item" data-id="{{ $levelTwo->id }}">
											    <div class="dd-handle">
											      {!! $levelTwo->title !!}
											      <span class="float-right dd-nodrag">
											        <a class="menu-edit-btn" href="{{route('admin.menu.edit',['id'=>$levelTwo->id])}}"><i class="fa fa-edit fa-edit"></i></a>
											        &nbsp; 
											        <a class="menu-delete-btn" data-id="{{ $levelTwo->id }}" class="remove_menu"><i class="fa fa-trash fa-edit"></i></a>
											      </span>
											    </div>
											  </li>
											  @endforeach
											</ol>

									    @endif
									  </li>
								  @endforeach
							</ol>

						@endif
					</li>
					@endforeach
				@endif
			</ol>
		</div>
		<div class="menu-save-button">
			<a class="btn btn-success btn-flat menu-sort-save" title="Save"><i class="fa fa-save"></i><span class="hidden-xs">&nbsp;Save</span></a>
		</div>
	</div>
</div>

@endsection
@push('styles')

<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/nestable2/css/jquery.nestable.min.css')}}">
@endpush
@push('scripts')
<script src="{{asset('backend/vendor/nestable2/js/jquery.nestable.min.js')}}"></script>
@include('setting::menu.scripts.indexScript')
@endpush