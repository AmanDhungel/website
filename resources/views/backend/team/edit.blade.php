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
                            {{trans('Full Name')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::text('full_name',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Full Name',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            Designation
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {{Form::select('designation_id',
                                    $designations->pluck('name','id'),
                                    Request::get('designation_id'),
                                    ['class'=>'form-control select2',
                                    'required',
                                    'style'=>'width: 100%',
                                    'placeholder'=> 'Select Designation Type'
                                    ])
                     }}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Address')}}
                        </label>
                        {!! Form::text('address',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Address',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Contact Number')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::number('contact_number',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Contact Number',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Contact Email Address')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::email('contact_email',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Contact Email Address',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Facebook Link')}}
                        </label>
                        {!! Form::text('facebook_link',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Facebook Link',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Instagram Link')}}
                        </label>
                        {!! Form::text('insta_link',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Instagram Link',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Twitter Link')}}
                        </label>
                        {!! Form::text('twitter_link',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Twitter Link',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Linkedin Link')}}
                        </label>
                        {!! Form::text('linkedin_link',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Linkedin Link',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">
                            Order
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::number('order',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Order',
                                'autocomplete'=>'off',
                                'required',
                                'min'=>'1'
                                ])
                        !!}
                        {!! $errors->first('name', '<small class="text text-danger">:message</small>') !!}
                    </div>
                    @if($data->image !=null)
                        <div class="form-group col-md-6 {{setFont()}}">
                            <label for="">
                                Uploaded Image
                            </label>
                            <br>

                            <a href="{{URL::to('/storage/'.$filePath.'/'.$data->image)}}"
                               target="_blank"
                               class="btn btn-secondary btn-xs rounded-pill"
                               data-placement="top" title="{{trans('message.pages.common.viewFile')}}"
                               style="margin: 10px 0 0 10px;"
                            >
                                <i class="fa fa-eye"></i>
                            </a>
                            &nbsp;

                            <a href="{{URL::to('/storage/'.$filePath.'/'.$data->image)}}"
                               target="_blank"
                               class="btn btn-danger btn-xs rounded-pill"
                               data-placement="top" title="Download Image"
                               style="margin: 10px 0 0 10px;"
                               download=""
                            >
                                <i class="fa fa-download"></i>
                            </a>

                        </div>
                    @endif

                    <div class="form-group col-md-6">

                        <label for="image">
                             Image
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        <input type="file"
                               class="form-control-file profile-img"
                               accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG"
                               name="image"
                        >

                        @if($errors->has('image') == null)
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
