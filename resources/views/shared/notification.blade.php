@if(Session::has('suc'))
	<div class="alert alert-success">
		{{Session::get('suc')}}
	</div>
@endif

@if(Session::has('err'))
	<div class="alert alert-danger">
		{{Session::get('err')}}
	</div>
@endif