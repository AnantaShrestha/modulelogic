@extends('backend.layouts.default')
@section('title',config('usermanagement.permission.index'))
@section('content')
	<div class="table-list-wrapper">
		{!! $permissionsDataTable['table'] !!}
	</div>
@endsection
@push('scripts')
	{!! $permissionsDataTable['script'] !!}
@endpush