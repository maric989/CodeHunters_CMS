<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/mystyle.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
{{--    <link href="{{asset('css/libs/style.css')}}" rel="stylesheet">--}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{--TITLE--}}
            @if(strpos(url()->full(),'definicije'))
                <a class="navbar-brand" href="/">Definicije</a>
            @elseif(strpos(url()->full(),'/'))
                <a class="navbar-brand" href="/">Posteri</a>
            @endif
        </div>
        <!-- /.navbar-header -->



        {{--<ul class="nav navbar-top-links navbar-right">--}}


            {{--<!-- /.dropdown -->--}}
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-user">--}}
                    {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-user -->--}}
            {{--</li>--}}
            {{--<!-- /.dropdown -->--}}



        {{--</ul>--}}

        {{--<div class="input-group searchform" style="width: 10%;float: right;margin-top: 10px; margin-right: 10px">--}}
            {{--<input type="text" class="form-control" placeholder="Search...">--}}
            {{--<span class="input-group-btn">--}}
                                    {{--<button class="btn btn-default" type="button">--}}
                                        {{--<i class="fa fa-search"></i>--}}
                                    {{--</button>--}}
                                {{--</span>--}}
        {{--</div>--}}






        {{--<ul class="nav navbar-nav navbar-right">--}}
        {{--@if(auth()->guest())--}}
        {{--@if(!Request::is('auth/login'))--}}
        {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
        {{--@endif--}}
        {{--@if(!Request::is('auth/register'))--}}
        {{--<li><a href="{{ route('auth.signup') }}">Register</a></li>--}}
        {{--@endif--}}
        {{--@else--}}
                {{--<li>--}}
                    {{--<form action="{{route('logout')}}" method="post">--}}
                        {{--{{csrf_field()}}--}}
                        {{--<button type="submit" class="logout_btn">Logout</button>--}}
                {{--</form>--}}
                {{--</li>--}}
                {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}

        {{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endif--}}
        {{--</ul>--}}

        <ul class="nav navbar-nav navbar-right" style="margin-right: 50px">
        @if(Auth::check())
            <li><a href="#"> {{Auth::user()->name}}</a></li>
            <li><a href="#"> Profile </a></li>
            <li>
                <form action="{{route('logout')}}" method="get">
                    {{csrf_field()}}
                    <button type="submit" class="logout_btn">Logout</button>
                </form>
            </li>
        @else
                <li><a href="{{route('login')}}"> Prijavi se</a> </li>
                <li><a href="{{route('auth.signup')}}"> Registruj se</a> </li>
            @endif
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">

                        <!-- /input-group -->

                    </li>
                    <li>
                        @if(strpos(url()->full(),'definicije'))
                            <a href="{{route('definition.hot')}}"><i class="fa fa-fire fa-fw"></i> sHot</a>
                        @else
                            <a href="/"><i class="fa fa-fire fa-fw"></i> Hot</a>
                        @endif
                    </li>

                    <li>
                        @if(strpos(url()->full(),'definicije'))
                            <a href="{{route('definition.trending')}}"><i class="fa fa-arrow-up fa-fw"></i>Trending<span class="fa arrow"></span></a>
                        @else
                            <a href="{{route('poster.trending')}}"><i class="fa fa-arrow-up fa-fw"></i>Trending<span class="fa arrow"></span></a>
                        @endif
                    </li>

                    <li>
                        @if(strpos(url()->full(),'definicije'))
                            <a href="{{route('definition.fresh')}}"><i class="fa fa-line-chart fa-fw"></i>Fresh<span class="fa arrow"></span></a>
                        @else
                        <a href="{{route('poster.fresh')}}"><i class="fa fa-line-chart fa-fw"></i> Fresh<span class="fa arrow"></span></a>
                        @endif
                    </li>
                    <hr>

                    <li>
                        <a href="{{route('definition.index')}}"><i class="fa fa-wrench fa-fw"></i>Definicije<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('definition.index')}}">Sve Definicije</a>
                            </li>
                            <li>
                                <a href="{{route('definition.add')}}">Dodaj Definiciju</a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Posteri<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Svi Posteri</a>
                            </li>
                            <li>
                                <a href="{{route('poster.add')}}">Dodaj Poster</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="{{route('author.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Autori<span class="fa arrow"></span></a>

                    </li>

                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>





    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/profile"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                </li>




                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="">All Posts</a>
                        </li>

                        <li>
                            <a href="">Create Post</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>





            </ul>

        </div>

    </div>

</div>






<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
                @include('layouts.flash-message')
                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
{{--<script src="{{asset('js/libs.js')}}"></script>--}}


@yield('footer')

{{--<script src="{{ asset('js/app.js') }}"></script>--}}

<script src="{{asset('js/http_code.jquery.com_jquery-2.2.4.js')}}"></script>
<script src="{{asset('js/http_ajax.googleapis.com_ajax_libs_jquery_3.1.1_jquery.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

{{--<!-- toastr notifications -->--}}
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('js/my_js.js')}}"></script>




</body>

</html>
