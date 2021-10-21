@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1 class="display-4">Feedback Edit Page</h1>
            <form action="{{ route('feedback.update') }}" method="POST">
                @csrf
                <input type="hidden" name="feedback_id" value="{{ $feedback->id }}" />
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $feedback->title }}" />
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Title</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="4">{{ $feedback->body }}</textarea>
                    @error('body')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a class="btn btn-secondary" href="{{ route('feedback') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>    
@endsection