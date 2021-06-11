@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="mb-3">
        		<a href="{{ url('listTestimonials/create') }}"  class="btn btn-primary">
        			<i class="fa fa-plus"> </i>
        			Add New Testimonial
        		</a>
        	</div>
            <div class="card">
                <div class="card-header">
                 {{ __('List Testimonials') }}
                </div>
                <div class="card-body">
                @include('includes.flash-message')
               <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#ID</th>
					      <th scope="col">Image</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">created_at</th>
					      <th scope="col"> Action</th>
					    </tr>
					  </thead>
					  <tbody>
                       @foreach($testimonials as $item)
					    <tr>
					      <th scope="row">{{ $item->id }}</th>
					      <td> <img src="{{asset($item->image)}}" width="100"></td>
					      <td>{{ $item->name }}</td>
					      <td>{{ $item->description }}</td>
					      <td>{{ $item->created_at }}</td>
					      <td>
					      	<a  class="btn btn-info btn-xs" href="{{ route('listTestimonials.edit', $item->id) }}">
					      		<i class="fa fa-edit text-light"></i>
					      	</a>
					      	<button  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $item->id }}"> 
					      		<i class="fa fa-trash text-light"></i>
					      	</button >
					      </td>
					    </tr>
					   
							<!-- Modal -->
								<div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Delete User:
											<b class="text-danger">{{ $item->id }}</b>
								        </h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								       Delete this Item {{ $item->id }} ?
								      </div>
								      <div class="modal-footer">
								      	<form style="display:none" method="post" action="{{ route('listTestimonials.destroy', $item->id)}}"> 
								      		@csrf
								      		@method('delete')
								      	 
								      	<button type="submit" class="btn btn-success" >
								      		<span class="fa fa-check"></span> Yes</button>
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								        </form>
								      </div>
								    </div>
								  </div>
								</div>
					   @endforeach
					  </tbody>
					</table>
                {{ $testimonials->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
