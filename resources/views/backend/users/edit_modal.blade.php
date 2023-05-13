<div class="modal fade"
     id="editModal{{$key}}"
     aria-hidden="true"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-primary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    {{trans('message.commons.edit')}}
                    <span style="font-size: 14px;"> {{trans('validation.pages.common.mandatory_field_message')}} </span>
                </h4>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {!! Form::model($data,['method'=>'PUT',
                        'route'=>['users.update',$data->id],
                        'enctype'=>'multipart/form-data',
                        'autocomplete'=>'off'])
                !!}
                <div class="row">


                    <div class="form-group col-md-6  {{setFont()}}">
                        <label for="inputName">
                            {{ trans('message.pages.users_management.user_type') }}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {{Form::select('role_id',
                                    $roleList->pluck('name','id'),
                                    Request::get('role_id'),
                                    ['class'=>'form-control select2',
                                    'required',
                                    'style'=>'width: 100%',
                                    'placeholder'=> trans('message.pages.role_access.select_user_type')
                                    ])
                     }}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">
                            {{ trans('message.pages.users_management.full_name') }}
                            <span class="text text-danger">
                                *
                                </span>
                        </label>
                        {!! Form::text('full_name',null,
                                ['class'=>'form-control',
                                'placeholder'=>trans('message.pages.users_management.full_name'),
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                        {!! $errors->first('full_name_np', '<small class="text text-danger">:message</small>') !!}
                    </div>
                    @if($data->image !=null)
                        <div class="form-group col-md-4 {{setFont()}}">
                            <label for="">
                                {{trans('message.pages.common.uploaded_photo')}}
                            </label>
                            <br>
                            <img src="{{asset('/storage/'.$filePath.'/'.$data->image)}}"
                                 alt="Image"
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
                    <div class="form-group col-md-4  {{setFont()}}">
                        <label for="image">
                            {{ trans('message.pages.users_management.user_image') }}
                        </label>
                        <input type="file"
                               class="form-control-file profile-img"
                               name="image"
                               accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG"
                        >
                        {!! $errors->first('image', '<span class="text text-danger">:message</span>') !!}

                        @if($errors->has('image') == null)
                            <span class="text text-danger"
                                  style="font-size: 12px;color: #ff042c"
                            >
                                   {{trans('message.pages.users_management.file_upload_message')}}
                            </span>
                        @endif
                    </div>


                </div>


                <div class="modal-footer justify-content-center {{setFont()}}">

                    @include('backend.components.buttons.updateAction')
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>
