<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>


    </head>
    <body>

        <div id="root">
            @include('partials.header')

            @yield('content')

            {{-- @include('partials.footer') --}}
        </div>

        {{--sfkasdopfkjdsapofdsf--}}





        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    </body>
</html>
