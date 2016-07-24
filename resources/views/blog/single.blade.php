@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', $titleTag)

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Catégorie: {{ $post->category->name }}</p>
        </div>
    </div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($post->comments as $comment)
				<div class="comment">
					<p><strong>{{ $comment->name }}</strong></p>
					<p>{{ $comment->comment }}</p><br>
				</div>
			@endforeach
		</div>
	</div>

    <div class="row">
    	<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top:25px">
    		{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', 'Nom:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-12">
						{{ Form::label('comment', 'Commentaire:') }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5'])}}

						{{ Form::submit('Commenter', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:25px']) }}
					</div>
				</div>	
    		{{ Form::close() }}
    	</div>
    </div>

@endsection