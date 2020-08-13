
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Promteric | login</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css" />
    <!-- icons -->
    <link href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
    <!-- bootstrap -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/extra_pages.css')}}">
    <!--Toastr-->
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
    <!-- favicon -->
    {{--<link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" />--}}
</head>

<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    {{Session::flash('Error',$error)}}
                @endforeach
            @endif
                <form method="post" action="{{route('loginCheck')}}" class="login100-form validate-form">
                @csrf
                <span class="login100-form-logo">
						<img alt="" src="{{asset('assets/img/logo-2.png')}}">
					</span>
                <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/pages/extra-pages/pages.js')}}"></script>

<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif


    @if(Session::has('delete'))
    toastr.info("{{Session::get('delete')}}")
    @endif

    @if(Session::has('Error'))
    toastr.error("{{Session::get('Error')}}")
    @endif

</script>
<!-- end js include path -->
</body>

</html>