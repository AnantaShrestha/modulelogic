@extends('backend.layouts.default')
@section('title',config('usermanagement.role.index'))
@section('content')
	<div class="table-list-wrapper">
		{!! $rolesDataTable['table'] !!}
	</div>
@endsection
@push('scripts')
	{!! $rolesDataTable['script'] !!}
@endpush