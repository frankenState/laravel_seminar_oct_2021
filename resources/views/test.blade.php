@extends('pages.parent')

@section('title')
    Test Page
@endsection

@section('navbar')
    @include('pages.navbar', [
        'links' => []
    ])
@endsection

@section('content')
    <!-- sessionkey = 123123123123 -->
    {{-- This is a comment testing --}}
    <h1>Using while</h1>
    @while ($num < 3)
        <p>Value of num = {{ $num++ }}</p>
    @endwhile

    <h1>Using forelse</h1>
    <ul>
    @forelse($customVariable1 as $k => $v)
        <li>{{"$v*2 = " . $v * 2}}</li>
    @empty
        <p>CustomVariable1 is empty</p>
    @endforelse
    </ul>

    <h1>Using foreach loop</h1>
    <ul>
    @foreach ($customVariable1 as $k => $v)
        <li>{{"$v^2 = " . $v ** 2}}</li>
    @endforeach
    </ul>

    @isset($customVariable1)
        <p>The customVariable1 variable exist</p>
    @endisset

    @empty($customVariable1)
        <p>The customVariable1 is empty. (from empty)</p>
    @endempty

    @if (count($customVariable1) === 1)
        <p>The customVariable1 has one element.</p>
    @elseif (count($customVariable1) == 0)
        <p>The customeVariable1 is empty (from elseif)</p>
    @else
        <p>The customVariable1 is greater than 1</p>
    @endif

    @switch($num)
        @case(1)
            <p>Num is equal to 1</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam animi sunt libero voluptatum cupiditate quae numquam illo reiciendis. Est velit impedit eaque doloribus odit eveniet odio quod recusandae earum eos!</p>
            @break
        @case(2)
            <p>Num is equal to 2</p>
            @break
        @default
            <p>Num is not equal to 1 or 2</p>
    @endswitch
    
    <h1>Test the Laravel Routes</h1>
    <p>{{ $string }}</p>

    <h1>Using Loops</h1>
    @for ($i = 0; $i < 10; $i++)
        <p>Paragraph in iteration {{ $i ** 2 }}<p>
    @endfor

@endsection