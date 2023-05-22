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
                            {{trans('Menu Type')}}
                            <span class="text text-danger">
                                    *
                                </span>
                        </label>
                        {!! Form::select('menu_type',$menuTypes,null,
                                ['class'=>'form-control select2',
                                'id'=>'menuTypeId',
                                'placeholder'=>'Select Type',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}" id="page" style="display: none;">
                        <label for="inputName">
                            {{trans('Pages')}}
                        </label>
                        {!! Form::select('page_menu_url',$pages->pluck('title','page_url'),null,
                                ['class'=>'form-control select2',
                                'placeholder'=>'Select Page',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}" id="outerUrl" style="display: none;">
                        <label for="inputName">
                            {{trans('External Site Url')}}
                        </label>
                        {!! Form::text('external_menu_url',null,
                                ['class'=>'form-control',
                                'placeholder'=>'External system url',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}" id="moduleMenu" style="display: none;">
                        <label for="inputName">
                            {{trans('Module Menu')}}
                        </label>
                        {!! Form::select('module_menu_url',$moduleMenus,null,
                                ['class'=>'form-control select2',
                                'id'=>'moduleMenuId',
                                'placeholder'=>'Select Menu',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}" id="programType" style="display: none;">
                        <label for="inputName">
                            {{trans('Program Type')}}
                        </label>
                        {!! Form::select('program_module_type',$programTypes->pluck('name','id'),null,
                                ['class'=>'form-control select2',
                                'placeholder'=>'Select Type',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}" id="publicationType" style="display: none;">
                        <label for="inputName">
                            {{trans('Publication Type')}}
                        </label>
                        {!! Form::select('publication_module_type',$publicationTypes->pluck('name','id'),null,
                                ['class'=>'form-control select2',
                                'placeholder'=>'Select Type',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}" id="partnerType" style="display: none;">
                        <label for="inputName">
                            {{trans('Partner Type')}}
                        </label>
                        {!! Form::select('partner_module_type',$partnerTypes->pluck('name','id'),null,
                                ['class'=>'form-control select2',
                                'placeholder'=>'Select Type',
                                'autocomplete'=>'off',
                                ])
                        !!}
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}" id="announcementType" style="display: none;">
                        <label for="inputName">
                            {{trans('Announcement Type')}}
                        </label>
                        {!! Form::select('announcement_module_type',$announcementTypes->pluck('name','id'),null,
                                ['class'=>'form-control select2',
                                'placeholder'=>'Select Type',
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
