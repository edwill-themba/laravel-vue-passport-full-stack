<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken:'{{ csrf_token() }}' }</script>
        <title>edwill technical test</title>
    </head>
    <body class="antialiased">
        <!-- include vue components on laravel blade -->
        <div id="app">
            <Navbar></Navbar>
            <div class="container">
            </div>
        </div>
        <!-- include app js file -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
