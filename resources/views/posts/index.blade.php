@extends('main')

@section('title', 'Tous les articles')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Tout les articles</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-blog btn-primary btn-h1-spacing">Créer un nouvel article</a>
		</div>
		
		<hr>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Titre</th>
						<th>Contenu</th>
						<th>Création</th>
						<th>Actions</th>
					</thead>

					<tbody>
						@foreach($posts as $post)
							<tr>
								<th>{{ $post->id }}</th>
								<td>{{ $post->title }}</td>
								<td>{{ substr($post->body, 0, 100) }}{{ strlen($post->body) > 100 ? "..." : "" }}</td>
								<td>{{ $post->getCreatedAtAttribute($post->created_at) }}</td>
								<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">Voir</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Modifier</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{!! $posts->links(); !!}
				</div>
			</div>
		</div>
	</div>

@endsection