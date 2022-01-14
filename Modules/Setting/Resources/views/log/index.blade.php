@extends('backend.layouts.default')
@section('content')
<div class="table-list-wrapper">
	{!! $logDataTable['table'] !!}
</div>
@endsection
@push('scripts')
	{!! $logDataTable['script'] !!}
@endpush