<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        {{--<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">--}}
        <link rel="stylesheet" href="{{asset('./bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        @yield('custom_style')
    </head>
    <body>
        <div class="container-fluid">
            <aside class="col-lg-2 aside">
                <nav class="nav">
                    <ul class="nav navbar navbar-left">
                        <li><a href="#">Users</a></li>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Roles</a></li>
                        <li><a href="#">Expoert to PDF</a></li>
                        <li><a href="#">settings</a></li>
                    </ul>
                </nav>
            </aside>
            <section class="col-lg-9 section">
                @yield('content')
            </section>
        </div>
        <script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('javascript/scripts.js')}}" type="text/javascript"></script>
        @yield('custom_scripts')
    </body>
</html>
