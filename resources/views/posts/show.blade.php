@extends('main')

@section('title', $post->title)

@section('content')
	<div class="row">
		<div class="col-md-8">
			<img class="img-responsive" src="{{ asset('images/'.$post->image) }}" alt="">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>
			<hr>
			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>

			<div id="backend-comments" style="margin-top! 50px;">
				<h3>Commentaires <small>{{ $post->comments()->count() }}</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Email</th>
							<th>Commentaire</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a href="{{ route('comments.edit', $comment->id)}}" class="btn btn-xs btn-primary">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>
									<a href="{{ route('comments.delete', $comment->id)}}" class="btn btn-xs btn-danger">
										<span class="glyphicon glyphicon-trash"></span>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>				
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Statut: </label>
					<div class="text-{{ $post->online == 1 ? 'success' : 'danger' }}">
						<strong>{{ $post->online == 1 ? 'En ligne' : 'Hors ligne' }}</strong>
					</div>
				</dl>
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
					<p>{{ $post->getCreatedAtAttribute($post->created_at) }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Dernière modification:</label>
					<p>{{ $post->getCreatedAtAttribute($post->updated_at) }}</p>
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
						{!! Html::linkRoute('posts.index', '<<< Tout les articles', [], array('class' =>'btn btn-default btn-block')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection