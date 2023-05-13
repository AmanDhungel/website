<div class="modal fade"
     id="addModal"
     aria-hidden="true"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-primary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    {{trans('message.commons.add')}}
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

                {!! Form::open(['method'=>'post',
                       'url'=>'users',
                       'enctype'=>'multipart/form-data',
                      'id'=>'addUerForm',
                       'autocomplete'=>'off'])
                !!}

                <div class="row {{setFont()}}">

                    <div class="form-group col-md-4 {{setFont()}}">
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


                    <div class="form-group col-md-4">
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

                    <div class="form-group col-md-4">
                        <label>
                            {{ trans('message.pages.users_management.login_user_name') }}
                        </label>

                        <label class="text text-danger">
                            *
                        </label>

                        {!! Form::text('login_user_name',null,
                                ['class'=>'form-control',
                                'id'=>'login_user_name',
                                'placeholder'=>trans('message.pages.users_management.login_user_name'),
                                'required'
                                ])
                        !!}
                        {!! $errors->first('login_user_name', '<span class="text text-danger">:message</span>') !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label>
                            {{ trans('message.pages.users_management.login_email_address') }}
                        </label>
                        <label class="text text-danger">
                            *
                        </label>

                        {!! Form::email('email',null,
                                ['class'=>'form-control',
                                'id'=>'email',
                                'required',
                                'placeholder'=>trans('message.pages.users_management.login_email_address'),
                                ])
                        !!}
                        {!! $errors->first('email', '<span class="text text-danger">:message</span>') !!}
                    </div>

                    @include('backend.components.commonAddStatus')

                    <div class="form-group col-md-4">
                        <label for="status">
                            {{ trans('message.pages.users_management.random_password') }}
                        </label>
                        <br>
                        <input class="radio-button"
                               type="radio"
                               name="rand_password"
                               checked=""
                               onclick="passwordYes();"
                               value="1"
                               style="margin-top: 2px"
                        >
                        {{ trans('message.button.yes') }}
                        &nbsp; &nbsp;
                        <input class="radio-button"
                               type="radio"
                               name="rand_password"
                               onclick="passwordNo()"
                               value="0" style="margin-top: 2px"
                        >
                        {{ trans('message.button.no') }}
                    </div>

                    <div class="form-group col-md-4"
                         id="passwordBlock"
                         style="display: none"
                    >
                        <label>
                            {{ trans('message.pages.users_management.password') }}
                        </label>
                        <label class="text text-danger">
                            *
                        </label>

                        {!! Form::password('password',
                                array('placeholder'=>'Password',
                                'class' => 'form-control'));
                        !!}

                        {!! $errors->first('password', '<span class="text text-danger">:message</span>') !!}
                    </div>

                    <div class="form-group col-md-4"
                         id="confirmPasswordBlock"
                         style="display: none"
                    >
                        <label>
                            {{ trans('message.pages.users_management.confirm_password') }}
                        </label>
                        <label class="text text-danger">
                            *
                        </label>

                        {!! Form::password('confirm_password',
                                array('placeholder'=>'Confirm Password',
                                'class' => 'form-control'));
                        !!}

                        {!! $errors->first('confirm_password', '<span class="text text-danger">:message</span>') !!}
                    </div>


                    <div class="form-group col-md-4">
                        <label for="status">
                            {{ trans('message.pages.users_management.send_email') }}
                        </label>
                        <br>
                        <input class="radio-button"
                               type="radio"
                               name="send_email"
                               value="1"
                               style="margin-top: 2px"
                        >
                        {{ trans('message.button.yes') }} &nbsp; &nbsp;
                        <input class="radio-button"
                               type="radio"
                               name="send_email"
                               value="0"
                               style="margin-top: 2px"
                               checked
                        >
                        {{ trans('message.button.no') }}
                    </div>

                    <div class="form-group col-md-4">

                        <label for="image">
                            {{ trans('message.pages.users_management.user_image') }}
                        </label>
                        <input type="file"
                               class="form-control-file profile-img"
                               accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG"
                               name="image"
                        >
                        {!! $errors->first('image', '<span class="text text-danger">:message</span>') !!}

                        @if($errors->has('image') == null)
                            <span class="text text-danger"
                                  style="font-size: 11px;color: #ff042c"
                            >
                              {{trans('message.pages.users_management.file_upload_message')}}
                            </span>
                        @endif
                    </div>

                </div>


                <div class="modal-footer justify-content-center {{setFont()}}">

                    @include('backend.components.buttons.addAction')
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
