<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title') - Toga (Toko Keluarga)</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/datatable/jquery.dataTables.min.css') }}" rel="stylesheet" />


    <!-- Animation library for notifications   -->
    <link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ URL::asset('assets/css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>

    {{-- Datepicker --}}
    <link href="{{ URL::asset('assets/datepicker-1.6/css/bootstrap-datepicker3.css') }}" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    {{-- <link href="{{ URL::asset('assets/css/demo.css') }}" rel="stylesheet" /> --}}

    <!--     Fonts and icons     -->
    <link href="{{ URL::asset('assets/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
    <style>
        .datepicker.datepicker-dropdown {
            z-index: 9000 !important;
        }
    </style>
    @stack('csscode')

</head>
<body>

<div class="wrapper">
    @include('layouts.sidebar')

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('title')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
{{--                         <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li> --}}
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifikasi
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="content">
            @if(session()->has('notifikasi'))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-{{ session('notifikasi')['cls'] }}"><span class="fa fa-info-circle"></span> {!! session('notifikasi')['text'] !!}</div>
                    </div>
                </div>
            </div>
            @endif

          @if (count($errors) > 0)
          <div class="container-fluid">
            @foreach ($errors->all() as $error)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger"><span class="fa fa-info-circle"></span> {{ $error }}</div>
                </div>
            </div>
            @endforeach
          </div>
          @endif

            @yield('content')
        </div>

        <footer class="footer">
            <div class="container-fluid">
                {{-- <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav> --}}
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>

@stack('modalcode')
</body>

    <!--   Core JS Files   -->
    <script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    
    {{-- Datepicker 1.6 --}}
    <script src="{{ URL::asset('assets/datepicker-1.6/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/datepicker-1.6/locales/bootstrap-datepicker.id.min.js') }}" type="text/javascript"></script>

    {{-- CKeditor --}}
    <script src="{{ URL::asset('assets/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/ckeditor/config.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ URL::asset('assets/js/bootstrap-checkbox-radio-switch.js') }}"></script>

	<!--  Charts Plugin -->
	{{-- <script src="{{ URL::asset('assets/js/chartist.min.js') }}"></script> --}}

    <!--  Notifications Plugin    -->
    <script src="{{ URL::asset('assets/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    {{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>--}}

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ URL::asset('assets/js/light-bootstrap-dashboard.js') }}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	{{--<script src="{{ URL::asset('assets/js/demo.js') }}"></script>--}}

	<script type="text/javascript">
    	$(document).ready(function(){

        	// demo.initChartist();

        	// $.notify({
         //    	icon: 'pe-7s-user',
         //    	message: "Selamat Datang di <b>TOGA</b> - Toko Keluarga ."

         //    },{
         //        type: 'info',
         //        timer: 4000
         //    });

            $('[data-toggle="tooltip"]').tooltip();

    	});
	</script>

    @stack('jscode')
</html>
