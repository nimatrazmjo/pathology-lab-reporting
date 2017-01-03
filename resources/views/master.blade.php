<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        {{--<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">--}}
        <link rel="stylesheet" href="{{asset('./bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('./font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        @yield('custom_style')
    </head>
    <body>
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <!-- <div class="absolute-wrapper"> </div> -->
        <!-- Menu -->
        <div class="side-menu">

            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="brand-wrapper">
                        <!-- Hamburger -->
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Brand -->
                        <div class="brand-name-wrapper">
                            <a class="navbar-brand" href="#">
                                Pathology Lab Reporting
                            </a>
                        </div>

                        <!-- Search -->
                        <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>

                        <!-- Search body -->
                        <div id="search" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form class="navbar-form" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">

                        <li><a href="/user"> Patient <span class="glyphicon glyphicon-send pull-right"></span></a></li>
                        <li class=""><a href="/report   ">Reporting <span class="glyphicon glyphicon-plane pull-right"></span></a></li>
                        @if(Auth::user())
                        <li class="panel panel-default" id="dropdown">
                            <a data-toggle="collapse" href="#dropdown-lvl1">
                                {{Auth::user()->name}} <span class="glyphicon glyphicon-user pull-right"></span> <span class="caret"></span>
                            </a>

                            <!-- Dropdown level 1 -->
                            <div id="dropdown-lvl1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="{{ url('/logout') }}">Logout <i class="fa fa-sign-out pull-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                       @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

        </div>

        <!-----------------  Main Content -------------->
        <div class="container-fluid">
            <div class="side-body">
                @yield('content')
            </div>
        </div>
        <!-----------------  end Main Content -------------->
    </div>

    <!----------------- Start Bootstrap Modal -------------->
    <div id="general-modal" class="modal fade" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    </div>
    <!----------------- End Bootstrap Modal -------------->

    <!----------------- Start Javascript -------------->
    <script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('javascript/scripts.js')}}" type="text/javascript"></script>
    @yield('custom_script')
    <!------------------ End Javascript ---------------->
    </body>
</html>
