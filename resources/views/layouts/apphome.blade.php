<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') - Toga (Toko Keluarga)</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ url('lte/bootstrap/css/bootstrap.min.css') }}">
  {{-- Datatable --}}
  <link rel="stylesheet" href="{{ url('lte/plugins/datatables/dataTables.bootstrap.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('assets/font-awesome/font-awesome.css') }}">
  {{-- Datepicker --}}
  <link rel="stylesheet" href="{{ url('lte/plugins/datepicker/datepicker3.css') }}">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <!-- jvectormap -->
  {{-- <link rel="stylesheet" href="{{ url('lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('lte/dist/css/skins/_all-skins.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  @stack('csscode')
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    @include('layouts.header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
        {{-- <small>Version 1</small> --}}
      </h1>
{{--       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">{{ \Route::getCurrentRoute()->getPath() }}</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
        {{-- @include('ltecontent') --}}
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
          <div class="row">
              <div class="col-md-12">
                  <div class="alert alert-danger"><span class="fa fa-info-circle"></span> {{ $error }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  
              </div>
          </div>
          @endforeach
        @endif

         @if(Session::get('notifikasi') !== null)
          <div class="row">
            <div class="col-md-12">                      
              <div class="alert alert-{{ Session::get('notifikasi')['cls'] }}"><span class="fa fa-info"></span> &nbsp;{{ Session::get('notifikasi')['text'] }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div> {{-- col --}}
          </div> {{-- row --}}
        @endif
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; {{ date('Y') }} <a href="//axquiredstudio.com">AxQuired Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  @include('layouts.rightsidebar')

</div>
<!-- ./wrapper -->

@stack('modalcode')

<!-- jQuery 2.2.3 -->
<script src="{{ url('lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('lte/bootstrap/js/bootstrap.min.js') }}"></script>
{{-- Datatables --}}
<script src="{{ url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
{{-- Datepicker --}}
<script src="{{ url('lte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('lte/plugins/datepicker/locales/bootstrap-datepicker.id.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('lte/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('lte/dist/js/app.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('lte/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
{{-- <script src="{{ url('lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script> --}}
{{-- <script src="{{ url('lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> --}}
<!-- SlimScroll 1.3.0 -->
<script src="{{ url('lte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
{{-- CKeditor --}}
<script src="{{ URL::asset('assets/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/ckeditor/config.js') }}" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
{{-- <script src="{{ url('lte/plugins/chartjs/Chart.min.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ url('lte/dist/js/pages/dashboard2.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ url('lte/dist/js/demo.js') }}"></script> --}}
@stack('jscode')
</body>
</html>
