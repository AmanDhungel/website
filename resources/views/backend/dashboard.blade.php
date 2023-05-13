@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 {{setFont()}}">
                            {{ trans('message.dashboard.page_title') }}
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item {{setFont()}}">
                                <a>
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    {{ trans('message.dashboard.page_title') }}
                                </a>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="box box-plane">
                @include('backend.message.flash')
            </div>
            <div class="container-fluid">

                <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="small-box bg-info {{setFont()}}">
                                <div class="inner">
                                    <h3>  {{$total_user}}</h3>
                                    <h5> {{ trans('message.dashboard.total_user') }}</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users-cog"></i>
                                </div>
                                <a href="{{url('users')}}" class="small-box-footer">{{trans('common.more_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('backend.modal.technical-error-modal')
@endsection

