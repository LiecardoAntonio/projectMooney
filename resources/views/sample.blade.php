<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sample Template</title>

        <!-- !!! THE LINE BELOW IS REQUIRED SO YOU CAN USE BOOTSTRAP !!! -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- !!! THE LINE ABOVE IS REQUIRED SO YOU CAN USE BOOTSTRAP !!! -->
    </head>

    <body>
        <h1>Sample Template</h1>
    </body>
</html>
