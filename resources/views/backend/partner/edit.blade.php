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
                        aria-label="Close">
                    <span aria-hidden="true"
                          data-toggle="tooltip"
                          title="Close"
                    >   &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">


                {!! Form::model($data,
                       ['method'=>'PUT',
                       'route'=>[$page_route.'.update',$data->id
                       ],
                         'enctype'=>'multipart/form-data',
                       ])
                !!}
                <div class="row">
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Name')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::text('name',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter name',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Types')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::select('type_id',$partnerTypes->pluck('name','id'),null,
                                ['class'=>'form-control select2',
                                'placeholder'=>'Select Type',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-6">

                        <label for="icon_image">
                            Icon Image
                        </label>
                        <input type="file"
                               class="form-control-file profile-img"
                               accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG"
                               name="icon_image"
                        >

                        @if($errors->has('icon_image') == null)
                            <span class="text text-danger"
                                  style="font-size: 14px;color: #ff042c"
                            >
                              {{trans('message.pages.users_management.file_upload_message')}}
                            </span>
                        @endif
                    </div>

                    @include('backend.components.commonEditStatus')
                </div>

                <div class="modal-footer justify-content-center {{setFont()}}">

                    @include('backend.components.buttons.updateAction')
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

