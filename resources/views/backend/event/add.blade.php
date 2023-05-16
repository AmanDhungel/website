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
                    <div class="form-group col-md-12 {{setFont()}}">
                        <label for="inputDescription">
                            {{trans('message.pages.roles.details')}}
                        </label>
                        {!! Form::textarea('descriptions',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter  Details',
                                'rows'=>'4',
                                'autocomplete'=>'off'
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
                    </div>

                    <div class="form-group col-md-6">

                        <label for="image">
                            File
                        </label>
                        <input type="file"
                               class="form-control-file profile-img"
                               accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf"
                               name="file"
                        >

                        @if($errors->has('image') == null)
                            <span class="text text-danger"
                                  style="font-size: 14px;color: #ff042c"
                            >
                              {{trans('message.pages.users_management.file_upload_message')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">
                            Event Date
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::text('event_date',null,
                                ['class'=>'form-control englishDatePicker eventDate',
                                'autocomplete'=>'off',
                                'required',
                                ])
                        !!}
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
