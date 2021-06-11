@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 {{ __('List Contact') }}
                </div>
                <div class="card-body">
                @include('includes.flash-message')
               <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#ID</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">created_at</th>
					      <th scope="col"> Action</th>
					    </tr>
					  </thead>
					  <tbody>
                       @foreach($contacts as $item)
					    <tr>
					      <th scope="row">{{ $item->id }}</th>
					      <td>{{ $item->name }}</td>
					      <td>{{ $item->email }}</td>
					      <td>{{ $item->created_at }}</td>
					      <td>
					      	<button  class="btn btn-info btn-xs" data-toggle="modal" data-target="#detail{{ $item->id }}"> 
					      		<i class="fa fa-eye text-light"></i>
					      	</button >
					      	<button  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $item->id }}"> 
					      		<i class="fa fa-trash text-light"></i>
					      	</button >
					      </td>
					    </tr>
					    <!-- Modal detail-->
							<div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">User: 
							        	<span class="text-primary">{{ $item->name }}</span>
							        	</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        {{ $item->message }}
							      </div>
							  	  </div>
							  </div>
							</div>

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
								      	<a href="deleteContact/{{ $item->id }}" class="btn btn-success">Yes</a>
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								        
								      </div>
								    </div>
								  </div>
								</div>
					   @endforeach
					  </tbody>
					</table>
                {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
