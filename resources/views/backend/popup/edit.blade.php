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
                    <div class="form-group col-md-12 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Title')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::text('title',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Enter Notice Title',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>


                    <div class="form-group col-md-12 {{setFont()}}">
                        <label for="inputDescription">
                            {{trans('message.pages.roles.details')}}
                        </label>
                        <textarea name="edit{{$data->id}}" class="form-control">
                            {!! $data->content !!}
                        </textarea>
                        {!! $errors->first('details', '<span class="label label-danger">:message</span>') !!}
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
