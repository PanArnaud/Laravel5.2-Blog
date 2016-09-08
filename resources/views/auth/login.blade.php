@extends('main')

@section('title', 'Login')

@section('content')
<div class="ui main text container">
{{-- <div class="ui one column centered grid"> --}}
    <div class="ten wide column">
        <h1 class="ui header">Connexion</h1>
    {!! Form::open(['class' => 'ui form']) !!}
        <div class="field">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null) }}
        </div>

        <div class="field">
            {{ Form::label('password', "Mot de passe:") }}
            {{ Form::password('password') }}
        </div>
        <div class="field">
            <div class="ui checkbox">
            {{ Form::checkbox('remember') }} {{ Form::label('remember', "Se souvenir de moi") }}
            </div>
        </div>
        {{ Form::submit('Login', ['class' => 'ui button form-spacing-top']) }}

        <p><a href="{{ url('password/reset') }}">Mot de passe oublié ?</a></p>
    {!! Form::close() !!}
    </div>
</div>
    
@endsection