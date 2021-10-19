@extends('pages.parent')


@section('title')
    Show Page
@endsection



@section('content')
    <h1 class="display-4">Showing the Page with an ID = {{ $page_id }}</h1>
    <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus repellendus asperiores, eveniet harum repellat ipsa maxime provident assumenda quaerat illo itaque, quibusdam at, quo facere ex quos voluptates ullam reiciendis.</p>
@endsection
