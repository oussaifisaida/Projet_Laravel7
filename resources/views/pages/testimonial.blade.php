@extends('layouts.app')

@section('content')
<img src="{{ asset('image/bg-banner.jpg') }}"  class="img-fluid" alt="image1">

<div class="SEE1">
<div class="container">
 
  <h1 > See What patients are saying ? </h1>
  <div class="row"> 
  	@foreach($testimonials as $item)

  <div class="col-sm-4"> 
    <p> {{ $item->description }}</p>
      <img src="{{ asset($item->image)}}" alt="{{ ($item->name)}}" title="{{ ($item->name)}}" width="50" height="50">
      <h4> {{ ($item->name)}} </h4>
  
    </div>
    @endforeach

  
    </div>
    </div>
</div>

@endsection
