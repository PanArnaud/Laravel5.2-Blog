@extends('main')

@section('title', 'Contact')

@section('content') 
  <div class="row">
    <div class="col-md-12">
      <h3>Contact me</h3>
        <hr>
        <form action="{{ url('contact') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label name="email">Email:</label>
            <input name="email" type="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label name="subject">Sujet:</label>
            <input name="subject" type="subject" id="subject" class="form-control">
          </div>
          <div class="form-group">
            <label name="message">Message:</label>
            <textarea name="message" id="message" class="form-control" placeholder="Votre message"></textarea>
          </div>
          <input type="submit" value="Envoyer le message" class="btn btn-success">
        </form>
    </div>
  </div>
@endsection