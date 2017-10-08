<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    {{--<link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset('/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/dataTables.responsive.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/custom.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
@include('layouts.admin.header')


@include('layouts.admin.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content')

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.admin.footer')
</div>
<!-- jQuery 2.1.3 -->
<!-- <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script> -->

<!-- jQuery UI 1.11.2 -->
<script src="{{ asset('/plugins/jQueryUI/jquery-ui.min.js') }}" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.2 JS -->
{{--<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"
        type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/select2.js') }} "></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
  @if(Session::has('notification'))
  alert("{{ Session::get('notification.alert-type') }}");
    var type = "{{ Session::get('notification.alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('notification.message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('notification.message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('notification.message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('notification.message') }}");
            break;
    }
  @endif
</script>            


@yield('script')
</body>
</html>