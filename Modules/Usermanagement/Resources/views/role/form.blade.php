@extends('backend.layouts.default')
@php
	$url=(isset($role)) ? route('admin.role.update',['id'=>$role['id']]) : route('admin.role.store');
@endphp
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' =>$url,'class'=>'form-data']) !!}
		<div class="form-row">
			<div class="form-group form-group-md-6">
				{!! Form::label('name', 'Role Name') !!}
				{!! Form::text('name',old('name',$role['name'] ?? ''),['class'=>'form-input','placeholder'=>'Role Name','data-validation'=>'required']) !!}
				@if ($errors->has('name'))
					<p class="validation-error"><i class="fa fa-times-circle"></i>&nbsp;{{ $errors->first('name') }}</p>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('slug', 'Role Slug') !!}
				{!! Form::text('slug',old('slug',$role['slug'] ?? ''),['class'=>'form-input','placeholder'=>'Role Slug']) !!}
				@if ($errors->has('slug'))
					<p class="validation-error"><i class="fa fa-times-circle"></i>&nbsp;{{ $errors->first('slug') }}</p>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('permission', 'Select Permission') !!}
				{!! Form::select('permissions[]',$permissions->pluck('name','id'),(isset($role)) ? $role->permissions->pluck('id') : old('permissions')  ,['class'=>'form-input multiple-select','id'=>'permission-list','multiple'=>'multiple']) !!}
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('Select User', 'Select User') !!}
				{!! Form::select('users[]',$users->pluck('name','id'),(isset($role)) ? $role->users->pluck('id') : old('users'),['class'=>'form-input multiple-select','id'=>'user-list','multiple'=>'multiple']) !!}
			</div>
			<div class="form-group form-group-md-12 form-action-button-wrapper">
				<button class="form-submit">{{isset($role) ? 'Update' : 'Create'}}</button>
				<a href="{{route('admin.role')}}" class="form-back">Back</a>
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection
@push('scripts')
	@include('backend.scripts.formvalidation')
@endpush