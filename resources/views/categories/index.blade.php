@extends('main')

@section('title', 'Les catégories')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Catégories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    <h3>Nouvelle catégorie</h3>
                    {{ Form::label('name', 'Nom:') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                    {{ Form::submit("Ajouter une catégorie", ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection