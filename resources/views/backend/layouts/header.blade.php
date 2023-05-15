<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-success navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link"
               data-widget="pushmenu"
               href="#"
               role="button"
            >
                <i class="fas fa-bars"></i>
                <span class="d-lg-none d-sm-inline-block {{setFont()}}"
                      style="font-weight: 700"
                >
                    {{trans('message.pages.common.menu')}}
                </span>
            </a>
        </li>



        <li class="nav-item d-none d-sm-inline-block">
            <a href="javascript:void(0)" class="nav-link {{setFont()}}"
               style="font-size: 16px;line-height:20px; margin-top: -8px">
                @if(systemSetting()->app_name)
                    {{ systemSetting()->app_name }}
                @else
                    {{ env('APP_NAME') }}
                @endif


            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="@if(isset(userInfo()->image))
                {{asset('/storage/'.userProfilePath().userInfo()->image)}}
                @else {{url('/images/user.jpg')}} @endif"
                     class="user-image img-circle elevation-2"
                     alt="User Image"
                >
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <li class="user-header bg-primary">
                    <img src="@if(isset(userInfo()->image)) {{asset('/storage/'.userProfilePath().userInfo()->image)}}
                    @else {{url('/images/user.jpg')}} @endif"
                         class="img-circle elevation-2" alt="User Image">
                    <p>
                        @if(isset(userInfo()->full_name))
                            {{userInfo()->full_name}}
                        @endif
                        <small>
                            Member since : {{ userInfo()->created_at->format('d') }} ,
                            {{ userInfo()->created_at->format('F') }} {{ userInfo()->created_at->format('Y') }}
                        </small>
                    </p>
                </li>
                <li class="user-footer">
                    <a href="{{url('my-profile')}}"
                       class="btn btn-secondary btn-sm rounded-pill btn-flat {{setFont()}}"
                    >
                        <i class="fas fa-user mr-2"></i>
                        {{trans('message.header.profile')}}
                    </a>

                    <a href="#"
                       class="btn btn-danger btn-sm rounded-pill btn-flat float-right {{setFont()}}"
                       data-toggle="modal"
                       data-target="#logoutModal"
                       title="Click here for logout"
                    >
                        <i class="fa fa-sign-out-alt"></i>
                        {{trans('message.header.sign_out')}}
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
<!-- logout  modal start -->
<div class="modal fade"
     id="logoutModal"
     aria-hidden="true"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn btn-primary rounded-pill">
                <h4 class="modal-title {{setFont()}}"> {{trans('message.pages.common.app_short_name')}}</h4>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['method' => 'POST',
                        'class'=>'inline', 'route'=>['logout']])
            !!}
            <div class="modal-body">
                <h6 class="{{setFont()}}">
                    {{trans('message.header.are_you_sure_you_want_to_sign_out')}}
                </h6>

            </div>
            <div class="modal-footer justify-content-center {{setFont()}}">
                <button type="submit"
                        class="btn btn-primary rounded-pill"
                >
                    <i class="fa fa-check-circle"></i>
                    {{trans('message.button.yes')}}
                </button>
                &nbsp; &nbsp;
                <button type="button"
                        class="btn btn-danger rounded-pill"
                        data-dismiss="modal"
                >
                    <i class="fa fa-times-circle"></i>
                    {{trans('message.button.no')}}
                </button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
