@extends('backend.layouts.default')
@section('content')
<div class="table-list-wrapper">
	{!! $usersDataTable['table'] !!}
</div>
@endsection
@push('scripts')
	{!! $usersDataTable['script'] !!}
@endpush