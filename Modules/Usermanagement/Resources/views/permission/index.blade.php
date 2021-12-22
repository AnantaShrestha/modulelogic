@extends('backend.layouts.default')
@section('title',config('usermanagement.permission.index'))
@section('content')
	<div class="table-list-wrapper">
		<div class="list-action-wrapper">
			<div class="row-wrapper">
				<div class="search-action">
					<input type="text" placeholder="Search" name="search" class="search-input">
				</div>
				<div class="other-action">
					<a href="{{route('admin.permission.create')}}" class="create-btn">Create</a>
				</div>
			</div>
		</div>
	</div>
@endsection