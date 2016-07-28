@extends('main')

@section('title', 'nouvel article')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

	<script src="{{ URL::to('js/tinymce/tinymce.min.js') }}"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: [
		    	'autolink link charmap preview',
		    	'table paste code image image'
		  	],
		  	language : "fr_FR",
		  	menubar: false,
		  	toolbar: 
		  		'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | tableimage',
		});


	</script>

@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Nouvel article</h1>
			<hr>
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
				{{ Form::label('title', 'Titre:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('slug', 'Slug:') }}
				{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' =>'255')) }}

				{{ Form::label('category_id', 'Catégorie:') }}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				{{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>

				{{ Form::label('body', 'Contenu:') }}
				{{ Form::textarea('body', null, array('class' => 'form-control')) }}

				{{ Form::submit('Ajouter l\'article', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection