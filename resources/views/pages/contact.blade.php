@extends('main')

@section('content') 
  <div class="row">
    <div class="col-md-12">
      <h3>Contact me</h3>
        <hr>
        <form action="">
          <div class="form-group">
            <label name="email">Email:</label>
            <input type="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label name="subject">Subject:</label>
            <input type="subject" id="subject" class="form-control">
          </div>
          <div class="form-group">
            <label name="message">Body:</label>
            <textarea name="message" id="message" class="form-control">Type your text here...</textarea>
          </div>
          <input type="submit" value="Send Message" class="btn btn-success">
        </form>
    </div>
  </div>
@endsection