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
                        'url'=>$page_url])
                !!}
                <div class="row">


                    <div class="form-group col-md-12">
                        <label for="inputName">
                            {{trans('common.name')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::text('name',null,
                                ['class'=>'form-control',
                                'placeholder'=>trans('common.name'),
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                        {!! $errors->first('name', '<small class="text text-danger">:message</small>') !!}
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
