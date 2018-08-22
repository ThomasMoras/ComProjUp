@extends('layouts.header')

@section('main')
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">

            @if(Auth::check())
                <h1><a href="/home">KiproMeet</a></h1>
            @else
                <h1><a href="/">KiproMeet</a></h1>
            @endif
            <nav class="links">

                <ul>
                    @if(Auth::check())
                        <li ><a href="{{ route('profil') }}">Profile</a></li>
                        <li ><a href="{{ route('search') }}">Recherche membres</a></li>
                        <li ><a href="{{ route('search-project') }}">Recherche projets</a></li>
                        <li ><a href="{{ route('conversations') }}">Conversation</a></li>

                        {{--<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">--}}
                        {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>--}}
                        {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>--}}
                        {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>--}}
                        {{--<li role="presentation" class="divider"></li>--}}
                        {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>--}}
                        {{--</ul>--}}
                        {{--<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">--}}
                            {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>--}}
                            {{--<li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>--}}
                            {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>--}}
                        {{--</ul>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="#">Action</a></li>--}}
                            {{--<li><a href="#">Another action</a></li>--}}
                            {{--<li><a href="#">Something else here</a></li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="#">Separated link</a></li>--}}
                        {{--</ul>--}}

                    @endif
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <div class="pull-right">
                            <li><a href="#"> {{ Auth::user()->name }}</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout</a></li>

                        </div>

                    @endif
                </ul>
            </nav>
            <nav class="main">
                <ul>
                    <!-- Authentication Links -->
                </ul>
            </nav>
        </header>

        <!-- Menu -->
        <section id="menu">
            <!-- Search -->
            <section>
                <form class="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search" />
                </form>
            </section>

            <!-- Links -->
            <section>
                <ul class="links">
                    <li>
                        <a href="#">
                            <h3>Lorem ipsum</h3>
                            <p>Feugiat tempus veroeros dolor</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Dolor sit amet</h3>
                            <p>Sed vitae justo condimentum</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Feugiat veroeros</h3>
                            <p>Phasellus sed ultricies mi congue</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Etiam sed consequat</h3>
                            <p>Porta lectus amet ultricies</p>
                        </a>
                    </li>
                </ul>
            </section>

            <!-- Actions -->
            <section>
                <ul class="actions stacked">
                    <li><a href="#" class="button large fit">Log In</a></li>
                </ul>
            </section>

        </section>

        {{--@if(View::hasSection('sideform'))--}}
        {{--<div class="col-sm-4" style="width: 40%;">--}}
        {{--@yield('sideform')--}}
        {{--</div>--}}
        {{--@endif--}}

        {{--class="" style="width: 40%;"--}}




        <div id="main" class="">
            <div>
                @yield('content')
            </div>

            @if(View::hasSection('projects'))
                <div style="width: 60%; margin-right: 5%">
                    @yield('projects')
                </div>
            @endif



        </div>

        @if(View::hasSection('sidebar'))
            <div class="">
                @yield('sidebar')
            </div>
        @endif



        {{--<div class="row">--}}
        {{--@if(View::hasSection('projects'))--}}
        {{--@yield('projects')--}}
        {{--@endif--}}
        {{--@yield('content')--}}
        {{--@if(View::hasSection('sidebar'))--}}
        {{--@yield('sidebar')--}}
        {{--@endif--}}
        {{--</div>--}}

        {{--@yield('content')--}}

    </div>
@endsection
