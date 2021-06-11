@extends('layouts.app')

@section('content')
<div class="CONTACT">
  <div class="container">
  <div class="row"> 
  <div class="col-sm-4"> 
    <h1> Contact us </h1>
    <h2> Contact info </h2>

    <i class="fa fa-map-marker" aria-hidden="true"></i> <span> 321 awsome street <br> </span>
      <span class="newyork"> new york 2002 </span> <br>
    <i class="fa fa-envelope-o" aria-hidden="true"></i> <span> bootstrap@gmail.com</span><br>
    <i class="fa fa-phone" aria-hidden="true"></i> <span> +11111111111 </span>
  </div>

  <div class="col-sm-8">
      @include('includes.flash-message')
    <h1> Having any query! or book an appointement </h1>
     <form method="post" action="{{ route('sendMessage') }}" enctype="multipart/form-data">
     @csrf
      <div class="form-group">
        <input type="text"  placeholder="Your name" class="form-control" name="name" required>
       </div>

      <div class="form-group">
        <input type="email" placeholder="your email" class="form-control" name="email" required>
      </div>

      <div class="form-group">
        <input type="text" placeholder="subject"class="form-control" name="subject" required> 
      </div>

      <div class="form-group">
         <textarea placeholder="message" class="form-control" name="message" rows="8" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">send message</button>
     </form>
</div>
</div>
</div>
</div>


@endsection
