<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Questions & Answers</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        @yield('styles')
    </head>
    <body>
        <!-- <div class="flex-center position-ref full-height"> -->
        @include('_includes/nav/topnav')
        @yield('content')
        <script src="{{ mix('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
