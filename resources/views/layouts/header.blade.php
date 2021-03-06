<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>ComProjUp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../assets/css/mainm.css" />
    <link rel="stylesheet" href="../../assets/css/mainm.css" />
    <link rel="stylesheet" href="../../../assets/css/mainm.css" />

</head>
<body class="is-preload">
<header id="header">
    @if(Auth::check())
        <h1><a href="/home">ComProjUp</a></h1>
    @else
        <h1><a href="/">ComProjUp</a></h1>
    @endif
    <nav class="links">
        <ul>
            @if(Auth::check())
                <li ><a href="{{ route('profil') }}">Profil</a></li>
                <li ><a href="{{ route('search') }}">Recherche</a></li>
                <li ><a href="{{ route('conversations') }}">Conversation</a></li>
            @endif
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <div class="pull-right" >
                    <li><a href="#"> {{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
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

<div >

    @yield('main')
</div>

</body>
</html>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

{{--<script src="../../assets/js/bootstrap.js"></script>--}}

{{--<script src="../../../public/assets/js/jquery.min.js"></script>--}}
{{--<script src="../../../public/assets/js/util.js"></script>--}}
{{--<script src="../../../public/assets/js/main.js"></script>--}}

{{--<script src="../../../public/assets/js/bootstrap.min.js"></script>--}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('.dropdown-toggle').dropdown();--}}
    {{--});--}}
{{--</script>--}}

{{--<script src="assets/js/browser.min.js"></script>--}}
{{--<script src="assets/js/browser.min.js"></script>--}}
{{--<script src="assets/js/breakpoints.min.js"></script>--}}
{{--<script src="assets/js/util.js"></script>--}}
{{--<script src="assets/js/main.js"></script>--}}
{{--<script src="assets/js/browser.min.js"></script>--}}
{{--<script src="assets/js/breakpoints.min.js"></script>--}}
{{--<script src="assets/js/bootstrap.min.js"></script>--}}
{{--<script src="assets/js/retina-1.1.0.js"></script>--}}
{{--<script src="assets/js/jquery.hoverdir.js"></script>--}}
{{--<script src="assets/js/jquery.hoverex.min.js"></script>--}}
{{--<script src="assets/js/jquery.prettyPhoto.js"></script>--}}
{{--<script src="assets/js/jquery.isotope.min.js"></script>--}}
{{--<script src="assets/js/custom.js"></script>--}}
