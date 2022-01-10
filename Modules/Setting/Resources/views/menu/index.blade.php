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
				@if($menus)
					@include('setting::menu.includes.menuListing')
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