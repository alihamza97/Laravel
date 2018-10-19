<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">

    <!-- Styles -->

</head>
<body>

      {{--<div class="flex-center position-ref full-height">--}}
                  {{--@if (Route::has('login'))--}}
               {{--<div class="top-right links">--}}
           {{--@if (Auth::check())--}}
          {{--<a href="{{ url('/home') }}">Home</a>--}}
                  {{--@else--}}
{{--<a href="{{ url('/foo') }}">Login</a>--}}
{{--<a href="{{ url('/register') }}">Register</a>--}}
{{--@endif--}}
{{--</div>--}}
{{--@endif--}}
@include('include.navBar')
<div class="container">
    @if(Request::is('/'))
        @include('include.showcase')
@else  <div>  @yield('content')</div>
    @endif


    <footer id="footer" class="text-center">
        <p> Copyright 2018 &copy; WikiCars</p>
    </footer>

</div>

</body>
</html>



