@extends('backend.layouts.default')
@php

@endphp
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' =>'','class'=>'form-data']) !!}
		<div class="form-row">
			
		</div>
	{!! Form::close() !!}
</div>
@endsection
@push('scripts')
	@include('backend.scripts.formvalidation')
@endpush