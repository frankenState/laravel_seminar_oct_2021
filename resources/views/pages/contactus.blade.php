@extends('pages.parent')

@section('title')
    Contact Us Page
@endsection


@section('content')
    <h1 class="display-4">Welcome to contact us</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus temporibus ratione dolor error laudantium dicta, laborum necessitatibus, eligendi tenetur, accusantium earum. Accusamus, cum hic illum culpa saepe nobis. Cumque, eligendi.</p>
    <ul>
        @foreach ($phone_numbers  as $k => $v)
           <li>{{ "$k -- $v" }}</li>
        @endforeach
    </ul>
@endsection