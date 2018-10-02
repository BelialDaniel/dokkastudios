@extends('layouts.app')

@section('pageTitle', 'Resume')

@section('scripts')
    <script src="{{ asset('/js/MassPointBehavior.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('/css/resume.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/card.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ asset('/css/mass_point.css') }}" type="text/css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection

@section('content')
<div id="card-container" class='container-mass-point'>
    <div id="card-surface" class='surface-mass-point'>
        <section id='profile'>
            <div>
                <img src="{{asset('/images/anubis.jpg')}}" alt="Anubis" style="width:100%">
                <h1> 
                    {{ $resume['basics']['name'] }}
                </h1>  
                <div id="title-profession">
                    {{ $resume['basics']['label'] }}
                </div>
                <p>
                    {{ $resume['basics']['email'] }}
                </p>
                <p>
                    {{ $resume['basics']['location']['city'] }}, {{ $resume['basics']['location']['region'] }}
                </p>
                <p>
                    <a href="{{ $resume['basics']['website'] }}">
                        DokkaStudios
                    </a>
                </p>
            </div> 
            <div>
                @foreach($resume['basics']['profiles'] as $profile)
                    @if($profile['network'] == 'GitHub')
                        <a href="{{ $profile['url'] }}">
                            <i class="fa fa-github">
                            </i>
                        </a>
                    @elseif($profile['network'] == 'LinkedIn')
                        <a href="{{ $profile['url'] }}">
                            <i class="fa fa-linkedin">
                            </i>
                        </a>
                    @elseif($profile['network'] == 'Twitter')
                        <a href="{{ $profile['url'] }}">
                            <i class="fa fa-twitter">
                            </i>
                        </a>
                    @endif
                @endforeach
            </div>
            <br>
        </section>
    </div>
</div>
<div id="resume-container">
    <section id='about'>
        <div>
            <div class="icon-align">
                <i class="material-icons md-light md-inactive ">
                    person
                </i>
            </div>
            <div>
                <h2>
                    About
                </h2>
            </div>
        </div>
        <div class="category-text-format">
            <p>
                {{ $resume['basics']['summary'] }}
            </p>
        </div>
    </section>
    <section id='work'>
        @if(count($resume['work']) >= 1 )
            <div>
                <div class="icon-align">
                    <i class="material-icons md-light md-inactive ">
                        work
                    </i>
                </div>
                <div>
                    <h2>
                        Experience
                    </h2>
                </div>
            </div>
            <div class="category-text-format">
                @foreach($resume['work'] as $work)
                    <div class="title-date-container">
                        <div class="title-section">
                            <a class="linksInResume" href="{{ $work['website'] }}">
                                {{ $work['company'] }}
                            </a>
                        </div>
                        <div class="date-section">
                            <div>
                                {{ $work['startDate'] }} - {{ $work['endDate'] == "" ? "Actual Work" :  $work['endDate'] }}
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>
                            {{ $work['position'] }}
                        </h4>
                        <p> 
                            {{ $work['summary'] }}
                        </p>
                        <div class="custom-list">
                            <span>
                                Highlights
                            </span>
                            <ul>
                                @foreach($work['highlights'] as $highlight)
                                    <li>
                                        {{ $highlight }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
    <section id='education'>
        @if(count($resume['education']) >= 1 )
            <div>
                <div class="icon-align">
                    <i class="material-icons md-light md-inactive ">
                        school
                    </i>
                </div>
                <div>
                    <h2>
                        Education
                    </h2>
                </div>
            </div>
            <div class="category-text-format">
                @foreach($resume['education'] as $education)
                    <div class="title-date-container">
                        <div class="title-section">
                            {{ $education['institution'] }}
                        </div>
                        <div class="date-section">
                            <div>
                                {{ $education['startDate'] }} - {{ $education['endDate'] }}
                            </div>
                        </div>
                    </div>
                    <p> 
                        {{ $education['studyType'] }}
                    </p>
                    <p> 
                        {{ $education['area'] }}
                    </p>
                    <p> 
                       {{ $education['gpa'] }}
                    </p>
                    <div class="custom-list">
                        <ul>
                            @foreach($education['courses'] as $course)
                                <li>
                                    {{ $course }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
    <section id='awards'>
        @if(count($resume['awards']) >= 1 )
            <h2>
                Awards
            </h2>
            <div class="categori-text-format">
                @foreach($resume['awards'] as $award)
                    <p> 
                        Title: {{ $award['title'] }}
                    </p>
                    <p> 
                        Date: {{ $award['date'] }}
                    </p>
                    <p> 
                        Awarder: {{ $award['awarder'] }}
                    </p>
                    <p> 
                        Summary: {{ $award['summary'] }}
                    </p>
                @endforeach
            </div>
        @endif
    </section>
    <section id='publications'>
        @if(count($resume['publications']) >= 1 )
            <div>
                <div class="icon-align">
                    <i class="material-icons md-light md-inactive ">
                        description
                    </i>
                </div>
                <div>
                    <h2>
                        Publications
                    </h2>
                </div>
            </div>
            <div class="category-text-format">
                <ul>
                    @foreach($resume['publications'] as $publication)
                        <li> 
                            {{ $publication['name'] }}
                        </li>
                        <span>
                            {{ $publication['publisher'] }} {{ $publication['releaseDate'] }}
                        </span>
                        <p>
                            {{ $publication['website'] }}
                        </p>
                        <p> 
                            {{ $publication['summary'] }}
                        </p>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
    <section id='skills'>
        @if(count($resume['publications']) >= 1 )
            <div>
                <div class="icon-align">
                    <i class="material-icons md-light md-inactive ">
                        style
                    </i>
                </div>
                <div>
                    <h2>
                        Skills
                    </h2>
                </div>
            </div>
            <div class="category-text-format">
                @foreach($resume['skills'] as $skill)
                    <div class="custom-list"> 
                        <span>
                                {{ $skill['name'] }}
                        </span>
                        <ul>
                            @foreach($skill['keywords'] as $keyword)
                                <li>
                                    {{ $keyword }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
    <section id='languages'>
        @if(count($resume['languages']) >= 1 )
            <div>
                <div class="icon-align">
                    <i class="material-icons md-light md-inactive ">
                        language
                    </i>
                </div>
                <div>
                    <h2>
                        Languages
                    </h2>
                </div>
            </div>
            <div class="category-text-format">
                @foreach($resume['languages'] as $language)
                    <p> 
                        {{ $language['language'] }} - {{ $language['fluency'] }}
                    </p>
                @endforeach
            </div>
        @endif
    </section>
    <section id='interests'>
        @if(count($resume['interests']) >= 1 )
            <div>
                <div class="icon-align">
                    <i class="material-icons md-light md-inactive ">
                        ballot
                    </i>
                </div>
                <div>
                    <h2>
                        Interests
                    </h2>
                </div>
            </div>
            <div class="custom-list">
                <ul>
                    @foreach($resume['interests'] as $interest)
                            <li>
                                {{ $interest['name'] }}
                            </li>
                            {{--
                            @if(count($interest['keywords']) >= 1 )
                                <ul>
                                    @foreach($interest['keywords'] as $keyword)
                                        <li>
                                            {{ $keyword }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            --}}
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
    <section id='volunteer'>
        @if(count($resume['volunteer']) >= 1 )
            <div>
                <div class="icon-align">
                    <i class="material-icons md-light md-inactive ">
                        
                    </i>
                </div>
                <div>
                    <h2>
                        Volunteer
                    </h2>
                </div>
            </div>
            <div class="category-text-format">
                @foreach($resume['volunteer'] as $volunteer)
                    <p> 
                        Organization: {{ $volunteer['organization'] }}
                    </p>
                    <p> 
                        Position: {{ $volunteer['position'] }}
                    </p>
                    <p> 
                        Website: {{ $volunteer['website'] }}
                    </p>
                    <p> 
                        {{ $volunteer['startDate'] }} - {{ $volunteer['endDate'] }}
                    </p>
                    <p> 
                        {{ $volunteer['summary'] }}
                    </p>
                    @if(count($volunteer['highlights']) >= 1)
                        <ul>
                            @foreach($volunteer['highlights'] as $highlight)
                                <li>
                                    {{ $highlight }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
        @endif
    </section>
    <section id='references'>
        @if(count($resume['references']) >= 1 )
            <div>
                <div class="icon-align">
                    <i class="material-icons md-light md-inactive ">
                    </i>
                </div>
                <div>
                    <h2>
                        References
                    </h2>
                </div>
            </div>
            <div class="category-text-format">
                @foreach($resume['references'] as $reference)
                    <p> 
                        Name: {{ $reference['name'] }}
                    </p>
                    <p> 
                        Reference: {{ $reference['reference'] }}
                    </p>
                @endforeach
            </div>
        @endif
    </section>
</div>
@endsection