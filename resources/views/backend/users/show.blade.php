<div class="modal fade"
     id="showModal{{$key}}"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-secondary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    {{  $data->full_name  }}    {{  'User' }} {{trans('message.pages.roles.details')}}
                </h4>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            {{trans('message.pages.users_management.user_type')}}
                        </label>
                        @if(isset($data->role))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->role->name  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            {{ trans('message.pages.users_management.full_name') }}
                        </label>
                        @if(isset($data->full_name))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->full_name  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            {{ trans('message.pages.users_management.login_user_name') }}
                        </label>
                        @if(isset($data->login_user_name))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->login_user_name  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>
                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            {{ trans('message.pages.users_management.login_email_address') }}
                        </label>
                        @if(isset($data->email))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->email  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            {{trans('message.pages.profile.address')}}
                        </label>
                        @if(isset($data->address))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->address  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>


                    <?php
                    use App\Models\Logs\LoginLogs;use Carbon\Carbon;$logInfo = LoginLogs::query()
                        ->where('user_id', $data->id)
                        ->latest()->first();
                    if (isset($logInfo))
                        $lastLogin = Carbon::createFromTimeStamp(strtotime($logInfo->created_at))->diffForHumans()
                    ?>
                    @if(isset($logInfo))
                        <div class="form-group col-md-4 {{setFont()}}">
                            <label for="">
                                {{trans('message.pages.profile.last_logged_in')}}
                            </label>
                            <input type="text"
                                   class="form-control"
                                   value="{{  $lastLogin  }}"
                                   readonly
                            >

                        </div>
                    @endif

                    @if($data->image !=null)
                        <div class="form-group col-md-4 {{setFont()}}">
                            <label for="">
                                {{ trans('message.pages.users_management.user_image') }}
                            </label>
                            <br>
                            <img src="{{asset('/storage/'.$filePath.'/'.$data->image)}}"
                                 alt="User"
                                 class="rounded-pill"
                                 style="width: 60px; height: 60px"
                            >
                            <a href="{{URL::to('/storage/'.$filePath.'/'.$data->image)}}"
                               target="_blank"
                               class="btn btn-secondary btn-xs rounded-pill"
                               data-placement="top" title="{{trans('message.pages.common.viewFile')}}"
                               style="margin: 10px 0 0 10px;"
                            >
                                <i class="fa fa-eye"></i>
                            </a>

                            <a
                                    href="javascript:void(0)"
                                    style="margin: 10px 0 0 10px;"
                                    class="btn btn-danger btn-xs rounded-pill deleteFile"
                                    data-id="{{ $data->id }}"
                                    data-widget="{{ $page_url }}"
                                    title="{{trans('message.pages.common.deleteFile')}}"
                            >
                                <i class="fa fa-trash">
                                </i>
                            </a>
                        </div>
                    @endif


                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            {{trans('message.commons.status')}}
                        </label>
                        <input type="text"
                               class="form-control"
                               value="{{ $data->status == 1 ? trans('message.button.active') : trans('message.button.inactive') }}"
                               readonly
                        >
                    </div>


                </div>


                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger rounded-pill {{setFont()}}"
                            data-dismiss="modal">
                        <i class="fa fa-times-circle"></i>
                        {{trans('message.button.close')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
