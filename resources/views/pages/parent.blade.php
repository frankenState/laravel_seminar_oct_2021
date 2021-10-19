<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
@include('pages.navbar', [
    'links' => [
        'Main' => route('main'),
        'Contact Us' => route('contact-us'),
        'Show Page' => route('show-page', [ 'id' => 13 ])
    ]
])
    <div class="container">
        @yield('content')
    </div>
</body>
</html>