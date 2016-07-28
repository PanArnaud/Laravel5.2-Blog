@extends('main')

@section('title', 'Contact')

@section('content') 
  <div class="row">
    <div class="col-md-12">
      <h3>Me contacter</h3>
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
      <h3>Réseaux</h3>
      <hr>
      <div id="hobbies" class="row hobbies">
        <div class="col-lg-6">
            <a class="text-primary" href="https://github.com/PanArnaud"><i class="fa fa-github fa-2x" aria-hidden="true"></i>  
              <p class="text-primary">Github</p>
            </a>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-6">
            <a class="text-primary" href="https://www.linkedin.com/pub/arnaud-panapadéatchy/96/829/60a"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i>
              <p class="text-primary">LinkedIn</p>
            </a>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </div>
  </div>
@endsection