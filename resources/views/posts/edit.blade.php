@extends('main')

@section('title', 'Editer article')

@section('stylesheets')
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
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Titre:') }}
			{{ Form::text('title', null, ["class" =>'form-control input-lg']) }}
			
			{{ Form::label('slug', 'Slug:', ["class" => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ["class" =>'form-control']) }}

			{{ Form::label('category_id', 'Catégorie: ', ["class" => 'form-spacing-top']) }}
			{{ Form::select('category_id', $categories, null, ["class" =>'form-control']) }}

			{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

			{{ Form::label('featured_image', 'Image liée:', ['class' => 'form-spacing-top'])}}
			{{ Form::file('featured_image') }}

			{{ Form::label('body', 'Contenu:', ["class" => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ["class" => 'form-control']) }}

			{{ Form::label('online', 'En ligne ?', ["class" => 'form-spacing-top']) }}
			{{ Form::checkbox('online', 1, $post->online == 1 ? true : false, ["type" => "checkbox"]) }}
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Création:</dt>
					<dd>{{ $post->getCreatedAtAttribute($post->created_at) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Dernière modification:</dt>
					<dd>{{ $post->getCreatedAtAttribute($post->updated_at) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Annuler', array($post->id), array('class' =>'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Sauvegarder', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div> <!-- End of .row -->
@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({{ json_encode($post->tags()->getRelatedIds()) }}).trigger('change');
	</script>
@endsection