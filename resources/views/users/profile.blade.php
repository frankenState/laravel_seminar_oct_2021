@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <h1 class="display-4">Profile Update Page</h1>
            @if (session('status'))
                <div class="alert alert-{{ session('status')['class'] }}">
                    {{ session('status')['message'] }}
                </div>
            @endif
            <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ $user->email }}" />
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" />
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" placeholder="Username" value="{{ $user->username }}" />
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" value="{{ $user->first_name }}" />
                    @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{ $user->last_name }}" />
                    @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contact_num">Contact Number</label>
                    <input class="form-control" type="text" name="contact_num" id="contact_num" placeholder="Contact Number" value="{{ $user->contact_num }}" />
                    @error('contact_num')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alt_contact_num">Alternative Contact Number</label>
                    <input class="form-control" type="text" name="alt_contact_num" id="alt_contact_num" placeholder="Alternative Contact Number" value="{{ $user->alt_contact_num }}" />
                    @error('alt_contact_num')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input class="form-control" type="file" name="avatar" id="avatar" placeholder="Avatar" />
                    @error('avatar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a class="btn btn-secondary" href="{{ route('home') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection