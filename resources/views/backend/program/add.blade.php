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

                    <div class="form-group col-md-6 {{setFont()}}">
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

                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Types')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::select('type_id',$programTypes->pluck('name','id'),null,
                                ['class'=>'form-control select2',
                                'placeholder'=>'Select Type',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-12 {{setFont()}}">
                        <label for="inputDescription">
                            {{trans('message.pages.roles.details')}}
                        </label>
                        <textarea name="editor1"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">
                            Start Date
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::text('start_date',null,
                                ['class'=>'form-control startDate englishDatePicker',
                                'autocomplete'=>'off',
                                'required',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputName">
                            End Date
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::text('end_date',null,
                                ['class'=>'form-control endDate englishDatePicker',
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
