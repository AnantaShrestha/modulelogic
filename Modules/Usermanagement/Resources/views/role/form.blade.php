@extends('backend.layouts.default')
@php

@endphp
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' =>'','class'=>'form-data']) !!}
		
	{!! Form::close() !!}
</div>
@endsection
@push('scripts')
	@include('backend.scripts.formvalidation')
@endpush