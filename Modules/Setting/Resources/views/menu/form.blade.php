@extends('backend.layouts.default')
@php
	$url=isset($menu) ? route('admin.menu.update',['id'=>$menu->id]) : route('admin.menu.create'); 
@endphp
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' =>$url,'class'=>'form-data']) !!}
		<div class="form-row">
			<div class="form-group form-group-md-6">
					{!! Form::label('title','Menu Title') !!}
					{!! Form::text('title',old('title',$menu['title'] ?? ''),['class'=>'form-input','placeholder'=>'Menu Title','data-validation'=>'required']) !!}
					@if ($errors->has('title'))
						<p class="validation-error"><i class="fa fa-times-circle"></i>&nbsp;{{ $errors->first('title') }}</p>
					@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('parent_id','Parent Menu') !!}
				{!! Form::select('parent_id',[''=>'Select Parent','0'=>'Root'] + $optionListMenu,(isset($menu)) ? $menu->parent_id : old('parent_id'),['class'=>'form-input','data-validation'=>'required']) !!}
				@if ($errors->has('parent_id'))
				<span class="text-danger">{{ $errors->first('parent_id') }}</span>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('icon','Icon') !!}
				{!! Form::text('icon',old('title',(isset($menu)) ? $menu->icon : ''),['class'=>'form-input icp icp-auto','placeholder'=>'Select Icon']) !!}
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('url','Url') !!}
				{!! Form::select('uri',[''=>'Select Url']+$urlList,(isset($menu)) ? $menu->uri : old('uri'),['class'=>'form-input']) !!}
			</div>
			<div class="form-group form-group-md-12 form-action-button-wrapper">
				<button class="form-submit">{{isset($menu) ? 'Update' : 'Create'}}</button>
				<a href="{{route('admin.menu')}}" class="form-back">Back</a>
			</div>
		</div>
	{!! Form::close() !!}
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/iconpicker/css/fontawesome-iconpicker.min.css')}}">
@endpush

@push('scripts')
	@include('backend.scripts.formvalidation')

	<script src="{{asset('backend/vendor/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
	<script>
		$(document).ready(function(){
			$('.icp-auto').iconpicker();
		})
	</script>
@endpush