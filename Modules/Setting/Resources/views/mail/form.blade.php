@extends('backend.layouts.default')
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' =>route('admin.mailSetting.store'),'class'=>'form-data']) !!}
		<div class="form-row">
					<div class="form-group form-group-md-6">
						{!! Form::label('driver', 'Driver') !!}
						{!! Form::text('driver',old('driver',$mail['driver'] ?? ''),['class'=>'form-input','placeholder'=>'Driver','data-validation'=>'required']) !!}
						@if ($errors->has('driver'))
							<span class="text-danger">{{ $errors->first('driver') }}</span>
						@endif
					</div>
					<div class="form-group form-group-md-6">
						{!! Form::label('host', 'Host') !!}
						{!! Form::text('host',old('host',$mail['host'] ?? ''),['class'=>'form-input','placeholder'=>'Host','data-validation'=>'required']) !!}
						@if ($errors->has('host'))
							<span class="text-danger">{{ $errors->first('host') }}</span>
						@endif
					</div>
					<div class="form-group form-group-md-6">
						{!! Form::label('post', 'Port') !!}
						{!! Form::text('port',old('port',$mail['port'] ?? ''),['class'=>'form-input','placeholder'=>'Port','data-validation'=>'required']) !!}
						@if ($errors->has('port'))
							<span class="text-danger">{{ $errors->first('port') }}</span>
						@endif
					</div>
					<div class="form-group form-group-md-6">
						{!! Form::label('encryption', 'Encryption') !!}
						{!! Form::select('encryption',[''=>'Select Encryption','tls'=>'TLS','ssl'=>'SSL'],(isset($mail)) ? $mail->encryption : old('encryption'),['class'=>'form-input']) !!}
						@if ($errors->has('encryption'))
							<span class="text-danger">{{ $errors->first('encryption') }}</span>
						@endif
					</div>
					<div class="form-group form-group-md-6">
						{!! Form::label('username', 'Username') !!}
						{!! Form::text('username',old('username',$mail['username'] ?? ''),['class'=>'form-input','placeholder'=>'Username','data-validation'=>'required']) !!}
						@if ($errors->has('username'))
							<span class="text-danger">{{ $errors->first('username') }}</span>
						@endif
					</div>
					<div class="form-group form-group-md-6">
						{!! Form::label('password', 'Password') !!}
						{!! Form::text('password',old('password',$mail['password'] ?? ''),['class'=>'form-input','placeholder'=>'Password','data-validation'=>'required']) !!}
						@if ($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="form-group form-group-md-6">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name',old('name',$mail['name'] ?? ''),['class'=>'form-input','placeholder'=>'Name','data-validation'=>'required']) !!}
						@if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="form-group form-group-md-6">
						{!! Form::label('address', 'Email Address') !!}
						{!! Form::text('address',old('address',$mail['address'] ?? ''),['class'=>'form-input','placeholder'=>'Email Address','data-validation'=>'required']) !!}
						@if ($errors->has('address'))
							<span class="text-danger">{{ $errors->first('address') }}</span>
						@endif
					</div>
					<div class="form-group form-group-md-12 form-action-button-wrapper">
						<button class="form-submit">{{(isset($mail)) && !empty($mail) ? 'Update' : 'Create'}}</button>
					</div>

				</div>
	{!!Form::close()!!}
</div>
@endsection
@push('scripts')
	@include('backend.scripts.formvalidation')
@endpush