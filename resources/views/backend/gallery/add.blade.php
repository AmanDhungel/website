<div class="modal fade"
     id="addModal"
     aria-hidden="true"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-lg">
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
                    <span aria-hidden="true"
                          data-toggle="tooltip"
                          title="Close"
                    >   &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'post',
                        'url'=>$page_url,
                           'enctype'=>'multipart/form-data',])
                !!}
                <div class="row">


                    <div class="form-group col-md-12 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Title')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::text('title',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Title',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>
{{--                    <div class="form-group col-md-12 {{setFont()}}">--}}
{{--                        <label for="inputDescription">--}}
{{--                            {{trans('message.pages.roles.details')}}--}}
{{--                        </label>--}}
{{--                        {!! Form::textarea('descriptions',null,--}}
{{--                                ['class'=>'form-control',--}}
{{--                                'placeholder'=>'Enter Details',--}}
{{--                                'rows'=>'4',--}}
{{--                                'autocomplete'=>'off'--}}
{{--                                ])--}}
{{--                        !!}--}}
{{--                        {!! $errors->first('details', '<span class="label label-danger">:message</span>') !!}--}}
{{--                    </div>--}}

                    <div class="form-group col-md-6">

                        <label for="image">
                            File
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        <input type="file"
                               class="form-control-file profile-img"
                               accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG"
                               name="image"
                               required
                        >

                        @if($errors->has('image') == null)
                            <span class="text text-danger"
                                  style="font-size: 14px;color: #ff042c"
                            >
                              {{trans('message.pages.users_management.file_upload_message')}}
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label>
                            Is Banner Image ?
                        </label>
                        <br>
                        <input class="radio-button"
                               type="radio"
                               name="is_banner_image"
                               value="1"
                               style="margin-top: 2px"
                        >
                       Yes
                        &nbsp; &nbsp;
                        <input class="radio-button"
                               type="radio"
                               checked
                               name="is_banner_image"
                               value="0" style="margin-top: 2px"
                        >
                        No
                    </div>

                    @include('backend.components.commonAddStatus')

                </div>

                <div class="modal-footer justify-content-center {{setFont()}}">

                    @include('backend.components.buttons.addAction')
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
