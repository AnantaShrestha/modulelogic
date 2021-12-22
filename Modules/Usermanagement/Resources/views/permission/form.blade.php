@extends('backend.layouts.default')
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' =>'','class'=>'form-data']) !!}
		<div class="form-row">
			<div class="form-group form-group-md-6">
				{!! Form::label('name', 'Permission Name') !!}
				{!! Form::text('name',old('name',$permission['name'] ?? ''),['class'=>'form-input','placeholder'=>'Permission Name','data-validation'=>'required']) !!}
				@if ($errors->has('name'))
					<span class="text-danger">{{ $errors->first('name') }}</span>
				@endif
			</div>
			<div class="form-group form-group-md-6">
				{!! Form::label('slug', 'Permission Slug') !!}
				{!! Form::text('slug',old('slug',$permission['slug'] ?? ''),['class'=>'form-input','placeholder'=>'Permission Slug']) !!}
				@if ($errors->has('slug'))
					<span class="text-danger">{{ $errors->first('slug') }}</span>
				@endif
			</div>
			<div class="form-group form-group-md-12">
				{!! Form::label('permission-list', 'Permission List') !!}
			</div>
			<div class="form-group form-group-md-12">
				<button class="form-submit">{{isset($permission) ? 'Update' : 'Create'}}</button>
				<a href="{{route('admin.permission')}}" class="form-back">Back</a>
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection