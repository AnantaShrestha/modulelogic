<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/setting.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bakend/css/fonts.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/login.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<section class="login-wrapper">
		<div class="login-form">
			{!! Form::open(['url'=>route('admin.loginProcess'),'class'=>'form-data']) !!}
				<div class="form-group">
					{!! Form::label('username', 'Username') !!}
					{!! Form::text('username',old('username'),['class'=>'form-control','placeholder'=>'Username','data-validation'=>'required']) !!}
					@if($errors->has('username'))
						@foreach($errors->get('username') as $message)
						<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
						@endforeach
					@endif
				</div>
				<div class="form-group">
					{!!Form::label('password', 'Password') !!}
					{!! Form::password('password',['class'=>'form-control','placeholder'=>'Password','data-validation'=>'required']) !!}
					@if($errors->has('password'))
						@foreach($errors->get('password') as $message)
						<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
						@endforeach
					@endif
				</div>
				<div class="form-flex">
					<div class="remember">
						<input class="form-check-input" type="checkbox" id="basic_checkbox_1" name="remember" value="1"
                  {{ (old('remember')) ? 'checked' : '' }}>
            <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
					</div>
					<div class="forget">
              <a href="#">Forgot Password?</a>
          </div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</div>
			{!! Form::close() !!}
		</div>
	</section>
</body>
</html>