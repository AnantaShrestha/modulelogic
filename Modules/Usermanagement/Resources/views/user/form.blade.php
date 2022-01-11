@extends('backend.layouts.default')
@php
$url=(isset($user)) ? route('admin.user.update',['id'=>$user['id']]) : route('admin.user.store');
@endphp
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' =>$url,'class'=>'form-data']) !!}
		<div class="form-row">
			<div class="form-group form-group-md-6">
				{!! Form::label('name', 'Full Name') !!}
				{!! Form::text('name',old('name',$user['name'] ?? ''),['class'=>'form-input','placeholder'=>'Full Name','data-validation'=>'required|string']) !!}
				@if ($errors->has('name'))
					<p class="validation-error"><i class="fa fa-times-circle"></i>&nbsp;{{ $errors->first('name') }}</p>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('username', 'Username') !!}
				{!! Form::text('username',old('username',$user['username'] ?? ''),['class'=>'form-input','placeholder'=>'Username','data-validation'=>'required']) !!}
				@if ($errors->has('username'))
				<span class="text-danger">{{ $errors->first('username') }}</span>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('email', 'Email') !!}
				{!! Form::email('email',old('email',$user['email'] ?? ''),['class'=>'form-input','placeholder'=>'Email','data-validation'=>'required|email']) !!}
				@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('avatar', 'Avatar') !!}
				{!! Form::file('image',['class'=>'form-input']) !!}
			</div>
			@if(!isset($user))
			<div class="form-group form-group-md-6">
				{!! Form::label('password','Password') !!}
				{!! Form::password('password',['class'=>'form-input','placeholder'=>'Password','data-validation'=>(isset($user)) ? '' : 'required|confirm']) !!}
				@if ($errors->has('password'))
				<span class="text-danger">{{ $errors->first('password') }}</span>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('confirm','Confirmation') !!}
				{!! Form::password('password_confirmation',['class'=>'form-input','placeholder'=>'Confirmation','data-validation'=>(isset($user)) ? '' : 'required']) !!}
			</div>
			@endif
			<div class="form-group form-group-md-6">
				{!! Form::label('roles','Select Roles') !!}
				{!! Form::select('role[]',$roles->pluck('name','id'),(isset($user)) ? $user->roles->pluck('id') : old('roles')  ,['class'=>'form-input role-list multiple-select','id'=>'roleList','multiple'=>'multiple']) !!}
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('permission', 'Select Permission') !!}
				{!! Form::select('permission[]',$permissions->pluck('name','id'),(isset($user)) ? $user->permissions->pluck('id') : old('permission')  ,['class'=>'form-input permission-list multiple-select','id'=>'userList','multiple'=>'multiple']) !!}
			</div>
			<div class="form-group form-group-md-12 form-action-button-wrapper">
				<button class="form-submit">{{isset($user) ? 'Update' : 'Create'}}</button>
				<a href="{{route('admin.user')}}" class="form-back">Back</a>
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection
@push('scripts')
	@include('backend.scripts.formvalidation')
@endpush