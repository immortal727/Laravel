<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>@section('title') My site @show</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>

<header>
    @section('header')
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                        <li><a href="{{ route('pages.about') }}" class="text-white">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>Album</strong>
            </a>

            @if(auth()->check())
                <a href="#">
                    {{auth()->user()->name}}

                    @if(auth()->user()->avatar)
                       {{-- <img src="{{asset(auth()->user()->avatar)}}" height="30px" alt="">--}}
                        <img src="{{asset('storage/app/public/'.auth()->user()->avatar)}}" height="30px" alt=""/>
                      {{--  {{asset('storage/app/public/'.auth()->user()->avatar)}}--}}
                    @endif
                </a>
                <a href="{{route('logout')}}">Logout</a>
            @else
                <a href="{{route('register.create')}}">Register</a>
                <a href="{{route('login.create')}}">Login</a>
            @endif


           {{-- <a href="{{route('posts.create')}}">Create</a>--}}


            @php
              //  dump(\Illuminate\Support\Facades\Auth::check())
            @endphp

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    @show
</header>

<main>
    <div class="container">
        @include('layouts.alerts')
    </div>
    @yield('content')
</main>

@include('layouts.footer')


<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('scripts')

</body>
</html>
