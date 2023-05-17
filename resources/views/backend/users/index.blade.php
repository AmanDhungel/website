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
                            {{ trans('message.pages.users_management.page_title') }}
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right {{setFont()}}">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    {{ trans('message.dashboard.page_title') }}
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <a href="{{url('users')}}">
                                    {{ trans('message.pages.users_management.page_title') }}
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                {{ trans('message.button.list') }}
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"
                                 style="text-align:center"
                            >
                                @include('backend.components.buttons.list')


                            </div>
                        </div>
                        <!-- /.card-header -->
                            <div class="card">
                                @if(sizeof($results) > 0)
                                <div class="card-body">
                                    <table id=""
                                           class="table table-bordered table-striped dataTable dtr-inline"
                                    >
                                        <thead class="th-header">
                                        <tr class="{{setFont()}}">
                                            <th width="10px">
                                                {{ trans('message.commons.s_n') }}
                                            </th>

                                            <th>
                                                {{ trans('message.pages.users_management.full_name') }}
                                            </th>

                                            <th>
                                                {{ trans('message.pages.users_management.login_email_address') }}
                                            </th>

                                            <th>
                                                {{ trans('message.commons.status') }}
                                            </th>

                                            <th style="width: 100px;"
                                            >
                                                {{ trans('message.commons.action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($results as $key=>$data)
                                            <tr>
                                                <th scope="row {{setFont()}}">
                                                    {{ ($results->currentpage()-1) * $results->perpage() + $key+1 }}
                                                </th>

                                                <td  class="{{setFont()}}">
                                                    {{  $data->full_name }}
                                                </td>

                                                <td>
                                                    {{$data->email}}
                                                    @if(isset($data->phone_number))
                                                        <br>
                                                        {{$data->phone_number}}
                                                    @endif
                                                </td>

                                                <td class="{{setFont()}}">
                                                    @if($data->id != \Illuminate\Support\Facades\Auth::user()->id)
                                                        @include('backend.components.buttons.status')
                                                    @endif
                                                </td>


                                                <td>
                                                    @if(userInfo()->role_id == 1 || userInfo()->role_id == 2)
                                                        <button type="button"
                                                                class="btn btn-success btn-xs rounded-pill passwordReset"
                                                                data-id="{{ $data->id }}"
                                                                data-widget="{{ $page_url }}"
                                                                title="  {{trans('message.pages.common.password_reset')}}"
                                                        >
                                                            <i class="fas fa-lock"></i>
                                                        </button>
                                                    @endif
                                                    &nbsp;
                                                    @include('backend.components.buttons.action')
                                                </td>
                                            </tr>

                                            @include('backend.modal.status_modal')
                                            @include('backend.modal.delete_modal')
                                            @include('backend.users.edit_modal')
                                            @include('backend.users.block_status-modal')
                                            @include('backend.modal.password-reset-modal')
                                            @include('backend.users.show')
                                            @include('backend.modal.file-delete-modal')
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div style="padding-top: 20px">
                                            <span class="fa-pull-left">
                                                Showing {{($results->currentpage()-1)*$results->perpage()+1}} to {{$results->currentpage()*$results->perpage()}}
                                                 of  {{$results->total()}} entries
                                            </span>
                                        <span class="float-right">
                                            {{ $results->appends(request()->except('page'))->links() }}
                                        </span>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                @else
                                    <div class="col-md-12 {{setFont()}}"
                                         style="padding-top: 10px"
                                    >
                                        <label class="form-control badge badge-pill"
                                               style="text-align:  center; font-size: 18px;"
                                        >
                                            <i class="fas fa-ban" style="margin-top: 6px"></i>
                                            {{trans('message.commons.no_record_found')}}
                                        </label>
                                    </div>
                                @endif
                            </div>
                    <!-- /.card -->


                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </section>
        <!-- /.container-fluid -->
        <!-- /.content -->
    </div>
    @include('backend.users.add_modal')
    @include('backend.users.search_modal')
    @include('backend.modal.check_data_modal')
    @include('backend.modal.data-submit-modal')
    <!-- /.content-wrapper -->
    <script>

        function passwordYes() {
            $("#passwordBlock").hide();
            $("#confirmPasswordBlock").hide();
        }

        function passwordNo() {
            $("#passwordBlock").show();
            $("#confirmPasswordBlock").show();
        }
    </script>
    @include('backend.modal.technical-error-modal')
@endsection
