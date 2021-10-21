@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('storage/avatars/'.$user->avatar) }}" class="card-img-top" alt="avatar image">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
        </div>
        <div class="col-md-9">
            <h1 class="display-4">Hello {{ $user->first_name." ". $user->last_name }} </h1>

        </div>
    </div>
</div><!-- end of container -->
@endsection
