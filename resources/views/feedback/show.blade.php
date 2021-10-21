@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <h1>{{ $feedback->title }}</h1>
            <p class="lead">{{ $feedback->body}}</p>
            <small>By {{ $feedback->user->first_name." ".$feedback->user->last_name }} on {{ date('F d, Y', strtotime($feedback->created_at)) }}</small>
            <hr class="mt-1 mb-2">
            <div class="btn-group">
                <a class="btn btn-outline-dark btn-sm" href="{{ route('feedback') }}">Back</a>
                <a class="btn btn-outline-dark btn-sm" href="{{ route('feedback.edit', ['id' => $feedback->id]) }}">Edit</a>
                <a class="btn btn-outline-danger btn-sm" href="{{ route('feedback.delete', ['id' => $feedback->id]) }}">Delete</a>
            </div>
        </div>
    </div>
</div>    
@endsection