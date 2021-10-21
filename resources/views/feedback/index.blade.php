@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-m-10 m-auto">
            <h1 class="display-4">Welcome to Feedback Page</h1>
            @if (session('status'))
                <div class="alert alert-{{ session('status')['class'] }}">
                    {{ session('status')['message'] }}
                </div>
            @endif
            <a class="btn btn-primary mb-2 mt-1" href="{{ route('feedback.create') }}">New Feedback</a>
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Posted on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->user->first_name." ".$feedback->user->last_name }}</td>
                        <td>{{ $feedback->title }}</td>
                        <td>{{ $feedback->status }}</td>
                        <td>{{ date('F d, Y', strtotime($feedback->created_at) )}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-outline-dark btn-sm" href="{{ route('feedback.edit', ['id' => $feedback->id]) }}">Edit</a>
                                <a class="btn btn-outline-dark btn-sm" href="{{ route('feedback.show', ['id' => $feedback->id]) }}">View</a>
                                <a class="btn btn-outline-danger btn-sm" href="{{ route('feedback.delete', ['id' => $feedback->id]) }}">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection