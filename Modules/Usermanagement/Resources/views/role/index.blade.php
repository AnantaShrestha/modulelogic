@extends('backend.layouts.default')
@section('content')
	<div class="table-list-wrapper">
		{!! $rolesDataTable['table'] !!}
	</div>
@endsection
@push('scripts')
	{!! $rolesDataTable['script'] !!}
@endpush