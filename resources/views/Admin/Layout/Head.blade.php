@section('head')
        <!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Prometric | Admin Dashboard</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <!-- icons -->
    <link href="{{asset('fonts/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('fonts/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/assets/css/view.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    {{--<!-- Material Design Lite CSS -->--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/material/material.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/material_style.css')}}">
    <!-- data tables -->

    <!-- Theme Styles -->
    <link href="{{asset('assets/css/theme/light/theme_style.css')}}" rel="stylesheet" id="rt_style_components"
          type="text/css"/>
    <link href="{{asset('assets/css/theme/light/style.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/theme/light/theme-color.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <!--select2-->

    <link href="{{asset('assets/plugins/select2/css/select2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!--Toastr-->
    {{--<link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">--}}

<!-- data tables -->
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <style>


        h4 {
            margin: 2rem 0rem 1rem;
        }


        td, th {
            vertical-align: middle;
        }

    </style>
    <script>
        window.laravel={!! json_encode([
            'csrfToken'=>csrf_token(),
        ])
         !!};
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body  class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
@endsection