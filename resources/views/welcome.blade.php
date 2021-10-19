<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Title</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    
    </head>
    <body>
        <h1>Welcome!</h1>
        <a href="<?php echo route('test_link'); ?>">Using Default PHP</a>
        <a href="{{ route('test_link') }}">To Test</a>
        <a href="{{ route('test_with_id', [ 'id' => 2 ]) }}">ID = 1</a>
    </body>
</html>
 