@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 {{ __('Dashboard') }}
                </div>
                <div class="card-body">
                 <h1>Bonjour, <b class="text-danger">{{ Auth::user()->name }}</b></h1>
                 <h2 class="text-success">{{ Auth::user()->email }}</h2>

                 <div class="row mt-5 text-center">

                    <div class="col-xs-12 col-md-4">
                        <i class="fa fa-users fa-2x fa-spin"></i>
                        <h3 class="mt-2"><b class="text-danger">{{ $users }}</b></h3>
                        <h3>Users</h3>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <i class="fa fa-envelope fa-2x fa-spin"></i>
                        <h3 class="mt-2"><b class="text-danger">{{  $contacts }}</b></h3>
                        <h3>Contacts</h3>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <i class="fa fa-tags fa-2x fa-spin"></i>
                        <h3 class="mt-2"><b class="text-danger">{{  $testimonials}}</b></h3>
                        <h3>Testimonials</h3>
                    </div>


                 </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
