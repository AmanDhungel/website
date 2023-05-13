<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title class="{{setFont()}}">
        @if(isset(systemSetting()->app_name))
                {{ systemSetting()->app_name }}
        @else
            {{ env('APP_NAME') }}
        @endif
            | Log in

    </title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <!-- Google Font: Source Sans Pro -->
   {{-- <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('theme-design/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme_switch.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/flag-icon-css/css/flag-icon.min.css')}}">

</head>
<body class="hold-transition login-page backgroundLogin">
<div class="login-box" id="block">
    @include('backend.modal.check_data_modal')
    <div class="login-logo">
        <img class="img-circle"
                src='@if(isset(systemSetting()->app_logo)){{asset('/storage/uploads/files/'.systemSetting()->app_logo)}} @else {{asset('images/logo.png')}} @endif'
                style='max-width: 20%;max-height:20%'/>
    </div>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary" style="border-radius: 20px">
        <div class="card-header text-center">
            <a
                    href="javascript:void(0)"
                    style="color: #0069d9; font-weight: bold"
                    class="{{ 'h5'}} {{setFont()}}"
            >
                @if(isset(systemSetting()->app_name))
                    {{  systemSetting()->app_name }}
                @else
                    {{ env('APP_NAME') }}
                @endif
            </a>
        </div>
        <div class="card-body">
            @if (Route::current()->getName() == 'login')
                <p class="login-box-msg {{setFont()}}" style="padding: 0 0 20px 0">
                    @if(isset(systemSetting()->login_title))
                        {{systemSetting()->login_title }}
                    @endif
                </p>
            @elseif(Route::current()->getName() == 'password.request')
                <p class="login-box-msg {{setFont()}}">
                    {{trans('message.authentication.forgot_password.forgot_password_title')}}
                </p>

            @else
                <p class="login-box-msg {{setFont()}}">
                    {{trans('message.authentication.password_reset.password_reset_title')}}
                </p>

        @endif

        @yield('content')
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('theme-design/js/main.min.js')}}"></script>
<script src="{{asset('plugins/validation/validate.min.js')}}"></script>
<script src="{{asset('plugins/validation/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
<script>
    $("document").ready(function () {
        setTimeout(function () {
            $("div.alert").remove();
        }, 5000); // 5 secs

    });
</script>
{{--@if(@$load_js)--}}
{{--    <script src="{{asset($load_js)}}"></script>--}}
{{--@endif--}}
@if(@$load_js)
    @foreach(@$load_js as $js)
        <script src="{{asset($js)}}"></script>
    @endforeach
@endif
<script type="text/javascript">
    var site_url = "{{asset('/')}}";
    @if(@$script_js)
        {!!$script_js!!}
    @endif
</script>
</body>
</html>
