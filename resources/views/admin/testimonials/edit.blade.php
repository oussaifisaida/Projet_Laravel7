@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 {{ __('Edit Testimonial') }}
                </div>
                <div class="card-body">
                  
    
     <form method="post" action="{{ route('listTestimonials.update' , $testimonial->id) }}" enctype="multipart/form-data">
     @csrf
     @method('patch')
      <div class="form-group">
        <input type="text"   class="form-control" name="name" value="{{ $testimonial->name}}" >
       </div>


      <div class="form-group">
         <textarea  class="form-control" name="description" rows="4" >
           {{ $testimonial->description }}
         </textarea>
      </div>

      <div class="form-group">
        <img src="{{ asset($testimonial->image) }}" width="100" height="100">
        <br> <br>
      	<label> Image</label>
        <input type="hidden" name="photo" value="{{$testimonial->image}}">
        <input type="file" name="image" > 
      </div>



      <button type="submit" class="btn btn-success">save</button>
     </form>


                 </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

