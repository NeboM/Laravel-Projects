<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyTaskList') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Delius&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-dark nav-color fixed-top">
            <div class="container max-width-2">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <i class="fas fa-cube color-custom-01"></i> {{ config('app.name', 'MyTaskList') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon float-right"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('pages.today') }}" >Today</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('future') ? 'active' : '' }}" href="{{ route('pages.future') }}">Future</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('history') ? 'active' : ''  }}" href="{{ route('pages.history') }}">History</a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @php
                                $userProgress = Auth::user()->user_progress;
                            @endphp

                            <li class="nav-item dropdown">
                                <a class="nav-link active mr-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-fire mr-1 {{ $userProgress->updated ? 'color-custom-01' : 'color-custom-03'}}"> {{$userProgress->current_streak}}</i> Daily Goal
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <div class="custom-dropdown">
                                        <div class="row">
                                            <div class="col-6">
                                                <h6 class="font-weight-bold">Daily Goal</h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="float-right mr-3"><a href="#" class="font-weight-bold edit color-custom-04">Edit goal</a></h6>
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <hr>
                                            <p class="mt-3 text-center btn-dark-custom">Choose level: </p>
                                            <p><a href="/noob"><span class=" font-weight-bold">NOOB:</span> <span class="float-right">1 task per day</span></a></p>
                                            <p><a href="/normal"><span class=" font-weight-bold">NORMAL:</span> <span class="float-right">3 tasks per day</span></a></p>
                                            <p><a href="/pro"><span class="font-weight-bold">PRO:</span> <span class="float-right">5 tasks per day</span></a></p>
                                            <p><a href="/master"><span class="font-weight-bold">MASTER:</span> <span class="float-right">8 tasks per day</span></a></p>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <p>Level: @if($userProgress->tasks_per_day == '1') Noob @elseif($userProgress->tasks_per_day == 3) Normal @elseif($userProgress->tasks_per_day == 5) Pro @else Master @endif <i class="fab fa-connectdevelop color-custom-03 font-weight-bold"></i> {{$userProgress->tasks_per_day}} tasks per day</p>
                                            <h4 class="color-custom-01 mt-4 font-weight-bold">{{$userProgress->current_streak}}</h4><p>current day streak</p>
                                            <h4 class="color-custom-01 mt-4 font-weight-bold">{{$userProgress->max_streak}}</h4><p> maximum day streak</p>
                                            @if($userProgress->updated)<p class="mt-4 btn-dark-custom font-weight-bold">Daily goal achieved :) @endif</p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>

                            </li>
                            <li class="nav-item dropdown active">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}

                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="clear"></div>
        <div class="clear"></div>
        <main class="py-4 container max-width-1">
            @yield('content')
        </main>
    </div>

<div class="clear"></div>
<footer class="footer fixed-bottom nav-color"><p class="text-center">2019 &copy; Небојша Митиќ</p></footer>
<script>
    $(document).ready(function(){
        $(".slide").hide();
        $(".edit").click(function(){
            $(".slide").slideToggle();
        });

    });
</script>
</body>
</html>
