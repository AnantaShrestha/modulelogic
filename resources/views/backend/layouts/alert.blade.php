<script>
	@if(\Session::has('message'))
		swal('{{\Session::get('type')}}','{{\Session::get('message')}}','{{\Session::get('type')}}')
	@endif
</script>
