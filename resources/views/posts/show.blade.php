@extends('main')

@section('title', $post->title)

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{{ $post->body }}</p>
			<hr>
			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url: </label>
					<p><a href="{{ route('blog.single', $post->slug)  }}">{{ url('blog/'.$post->slug)  }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Catégorie: </label>
					<p>{{ $post->category->name }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Création:</label>
					<p>{{ date('M j, Y G:i', strtotime($post->created_at)) }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Dernière modification:</label>
					<p>{{ date('M j, Y G:i', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Editer', array($post->id), array('class' =>'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
						{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						{!! Html::linkRoute('posts.index', '<<< Tout les articles', [], array('class' =>'btn btn-blog btn-default btn-block')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection