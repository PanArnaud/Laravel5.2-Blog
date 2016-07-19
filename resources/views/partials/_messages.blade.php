@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('success') }}
	</div>
@endif

@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<strong>Erreurs:</strong>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</div>
@endif