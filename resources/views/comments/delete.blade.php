@extends('main')

@section('title', 'Supprimer commentaire ?')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Supprimer ce commentaire ?</h1>
			<p><strong>Nom:</strong> {{ $comment->name }}</p>
			<p><strong>Email:</strong> {{ $comment->email }}</p>
			<p><strong>Commentaire:</strong> {{ $comment->comment }}</p>
		
			{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) }}
				{{ Form::submit('Oui, supprimer', ['class' => 'btn btn-large btn-block btn-danger']) }}
		{{ Form::close() }}
		</div>
	</div>
@endsection