@extends('backend.layouts.default')
@section('content')
<div class="error-wrapper">
	<div class="error-content">
		<span>!! Somthing were wrong !!</span>
		<h1>{{\Session::get('errorMessage') ?? ''}}</h1>
		<h3>
			{{\Session::get('file') ?? ''}}
			@if(\Session::has('line'))
			<span class="error-line-no">Line No {{\Session::get("line") ?? ''}}</span>
			@endif
		</h3>
	</div>
</div>
@endsection