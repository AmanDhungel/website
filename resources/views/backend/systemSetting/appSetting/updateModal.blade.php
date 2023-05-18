<div class="modal fade"
     id="editModal"
     aria-hidden="true"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-primary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    {{trans('message.commons.edit')}}
                </h4>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                >
                                                    <span aria-hidden="true"
                                                          data-toggle="tooltip"
                                                          title="Close"
                                                    >
                                                        &times;
                                                    </span>
                </button>
            </div>
            <div class="modal-body">

                {!! Form::model($result,['method'=>'PUT',
                        'route'=>[$page_route.'.'.'update',$result['id']],
                        'enctype'=>'multipart/form-data',
                        'autocomplete'=>'off'])
                !!}
                <div class="row">

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            {{trans('message.pages.system_setting.app_setting.app_name')}}
                        </label>

                        {!! Form::text('app_name',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter App    Name',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_name', '<small class="text text-danger">:message</small>') !!}
                    </div>
                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            {{trans('message.pages.system_setting.app_setting.app_short_name')}}
                        </label>

                        {!! Form::text('app_short_name',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter App    Name',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                           Office Address
                        </label>

                        {!! Form::text('office_address',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office  Phone
                        </label>

                        {!! Form::number('office_phone',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office  Alternative Phone
                        </label>

                        {!! Form::number('office_phone_1',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office  Email Address
                        </label>

                        {!! Form::email('office_email_address',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Alternative   Email Address
                        </label>

                        {!! Form::email('office_email_address_1',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Contact Person Name
                        </label>

                        {!! Form::text('office_contact_person_name',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Contact Person Contact Number
                        </label>

                        {!! Form::number('office_contact_person_number',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Contact Person Name
                        </label>

                        {!! Form::text('office_contact_person_name',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Facebook Link
                        </label>

                        {!! Form::text('office_facebook_link',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Youtube Link
                        </label>

                        {!! Form::text('office_youtube_link',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>
                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Twitter Link
                        </label>

                        {!! Form::text('office_twitter_link',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Linkedin Link
                        </label>

                        {!! Form::text('office_linked_in_link',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            Office Instagram  Link
                        </label>

                        {!! Form::text('office_insta_link',null,
                                ['class'=>'form-control',
                                'autocomplete'=>'off'])
                        !!}
                        {!! $errors->first('app_short_name', '<small class="text text-danger">:message</small>') !!}
                    </div>


                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="image">
                            {{trans('message.pages.system_setting.app_setting.app_logo')}}
                        </label>
                        <input type="file"
                               class="form-control-file"
                               name="app_logo"
                        >
                        {!! $errors->first('app_logo', '<span class="text text-danger">:message</span>') !!}

                        @if($errors->has('app_logo') == null)
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
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>