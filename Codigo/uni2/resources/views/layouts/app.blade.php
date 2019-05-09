<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
        <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">

        @include('layouts.partials.metadata')
    </head>
    <body class="md-skin fixed-sidebar fixed-nav">
        <input type="hidden" id="base_url" value="{{ url('/') }}">
        <input type="hidden" id="route" value="<?= URL::current() ?>">
        <input type="hidden" id="exists" value="{{ route('exists') }}">
        <div id="wrapper">
            @yield('header')
        </div>
        @include('layouts.partials.scripts')
    </body>
</html>