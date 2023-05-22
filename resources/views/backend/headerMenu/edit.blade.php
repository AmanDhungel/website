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


                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Parent Menu')}}
                        </label>
                        {!! Form::select('parent_id',$menus->pluck('menu_name','id'),null,
                                ['class'=>'form-control select2',
                                'placeholder'=>'Select menu',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Menu Name')}}
                            <span class="text text-danger">*</span>
                        </label>
                        {!! Form::text('menu_name',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Menu name',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Menu Url')}}
                        </label>
                        {!! Form::text('menu_url',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Menu url',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="inputName">
                            {{trans('Order')}}
                            <span class="text text-danger">
                                    *
                            </span>
                        </label>
                        {!! Form::number('order',null,
                                ['class'=>'form-control',
                                'placeholder'=>'Display order',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
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
