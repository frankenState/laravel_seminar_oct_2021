@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('storage/avatars/'.$user->avatar) }}" class="card-img-top" alt="avatar image">
              <div class="card-body">
                <h5 class="card-title">{{ $user->first_name." ".$user->last_name }}</h5>
              </div>
            </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              <h1 class="display-4">Hello {{ $user->first_name." ". $user->last_name }} </h1>
              <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum, numquam eum ducimus id, minus dolor corrupti obcaecati nobis hic quia tenetur rem fugit inventore quas reprehenderit ratione iure temporibus molestias.</p>
            </div>
          </div>

        </div>
    </div>
</div><!-- end of container -->
@endsection
