@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 {{ __('List Users') }}
                </div>
                <div class="card-body">
                
               <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#ID</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">created_at</th>
					    </tr>
					  </thead>
					  <tbody>
                       @foreach($users as $item)
					    <tr>
					      <th scope="row">{{ $item->id }}</th>
					      <td>{{ $item->name }}</td>
					      <td>{{ $item->email }}</td>
					      <td>{{ $item->created_at }}</td>
					    </tr>
					   @endforeach
					  </tbody>
					</table>
            {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
