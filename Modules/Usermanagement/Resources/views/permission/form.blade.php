@extends('backend.layouts.default')
@php
	$url=isset($permission) ? route('admin.permission.update',['id'=>$permission->id]) : route('admin.permission.create'); 
@endphp
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' =>$url,'class'=>'form-data']) !!}
		<div class="form-row">
			<div class="form-group form-group-md-6">
				{!! Form::label('name', 'Permission Name') !!}
				{!! Form::text('name',old('name',$permission['name'] ?? ''),['class'=>'form-input','placeholder'=>'Permission Name','data-validation'=>'required']) !!}
				@if ($errors->has('name'))
					<p class="validation-error"><i class="fa fa-times-circle"></i>&nbsp;{{ $errors->first('name') }}</p>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('slug', 'Permission Slug') !!}
				{!! Form::text('slug',old('slug',$permission['slug'] ?? ''),['class'=>'form-input','placeholder'=>'Permission Slug']) !!}
				@if ($errors->has('slug'))
					<p class="validation-error"><i class="fa fa-times-circle"></i>&nbsp;{{ $errors->first('slug') }}</p>
				@endif
			</div>
			<div class="form-group form-group-md-12">
				{!! Form::label('permission-list', 'Permission List') !!}
				<div class="permissionlist-wrapper">
					@include('usermanagement::permission.includes.permission-list')
				</div>
			</div>
			<div class="form-group form-group-md-12">
				<button class="form-submit">{{isset($permission) ? 'Update' : 'Create'}}</button>
				<a href="{{route('admin.permission')}}" class="form-back">Back</a>
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection
@push('scripts')
	@include('backend.scripts.formvalidation')
@endpush