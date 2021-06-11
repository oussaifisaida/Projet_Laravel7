@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 {{ __('Add New Testimonial') }}
                </div>
                <div class="card-body">
                  
    
     <form method="post" action="{{ route('listTestimonials.store') }}" enctype="multipart/form-data">
     @csrf
      <div class="form-group">
        <input type="text"  placeholder="Your name" class="form-control" name="name" required>
       </div>

     
      <div class="form-group">
         <textarea placeholder="description" class="form-control" name="description" rows="4" required></textarea>
      </div>

      

      <div class="form-group">
      	<label> Image</label>
        <input type="file" name="image" required> 
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

