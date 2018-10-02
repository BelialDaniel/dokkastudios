<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>DokkaStudios - @yield('pageTitle')</title>
        {{-- 
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
        --}}

        {{-- Fonts --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Abel|Dosis|Open+Sans+Condensed:300">
        
        {{--Main CSS--}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/appmain.css') }}">
        
         {{-- Styles --}}
         @yield('styles')

        {{-- JavaScript --}}
        @yield('scripts')
        
    </head>
    <body>
        <div class='menu'>
            <a href="#contact">
                Contact
            </a>
            <a href="#about">
                About
            </a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class='container'>
            @yield('content')
        </div>
    </body>
</html>