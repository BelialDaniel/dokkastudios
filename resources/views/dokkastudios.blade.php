@extends('layouts.app')

@section('pageTitle', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/css/dokkastudios.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ asset('/css/card.css') }}" type="text/css"> 
    
    <link rel="stylesheet" href="{{ asset('/css/mass_point.css') }}" type="text/css"> 
@endsection

@section('scripts')
    <script src="{{ asset('/js/MassPointBehavior.js') }}"></script>
@endsection

@section('content')
    <div id="card-container" class="container-mass-point">
        <div id="card-surface" class="surface-mass-point">
            <div>
                <img src="{{asset('/images/anubis.jpg')}}" alt="Anubis" style="width:100%">
            </div>
            <div>
                <h1>
                    Daniel A. Maldonado Morales
                </h1>
                <h2>
                    Software Developer
                </h2>
                <h3 id="tittle-company">
                    Dedagroup México
                </h3>
                <a href="https://linkedin.com/in/daniel-maldonado-morales">
                    <i class="fa fa-linkedin"></i>
                </a> 
                <a href="https://github.com/belialdaniel">
                    <i class="fa fa-github"></i>
                </a> 
                <p>
                    <button onclick="location.href='{{ url('/resume/Daniel') }}'">
                        View Resume
                    </button>
                </p>
            </div>
        </div>
    </div>
@endsection   