@extends('backend.layouts.default')
@section('content')
	<div class="table-list-wrapper">
		{!! $permissionsDataTable['table'] !!}
	</div>
@endsection
@push('scripts')
	{!! $permissionsDataTable['script'] !!}
@endpush