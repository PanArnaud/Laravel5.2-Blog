@extends('main')

@section('title', 'Editer article')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Titre:') }}
			{{ Form::text('title', null, ["class" =>'form-control input-lg']) }}
			
			{{ Form::label('slug', 'Slug:', ["class" => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ["class" =>'form-control']) }}

			{{ Form::label('category_id', 'Catégorie: ', ["class" => 'form-spacing-top']) }}
			{{ Form::select('category_id', $categories, null, ["class" =>'form-control']) }}

			{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

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