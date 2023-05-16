<div class="modal fade"
     id="searchModal"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-primary rounded-pill {{setFont()}}">
                <h4 class="modal-title">
                    <i class="fa fa-filter"></i>
                    {{trans('message.button.filter')}}
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

                {!! Form::open(['method'=>'get',
                     'url'=>$page_url,
                     'autocomplete'=>'off'])
                !!}
                <div class="row {{setFont()}}">
                    <div class="form-group col-md-6">
                        {!!Form::text('name',
                            Request::get('name'),
                            ['class'=>'form-control',
                            'autocomplete'=>'off',
                            'width'=>'100%',
                            'placeholder'=>trans('message.pages.roles.name')])
                            !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!!Form::select('status',dataStatus(),
                            Request::get('status'),
                            ['class'=>'form-control select2',
                            'style'=>'width: 100%;','placeholder'=>
                            trans('message.commons.selectStatus')])
                        !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        {!!Form::text('to_date',
                                 Request::get('to_date'),['class'=>'form-control englishDatePicker',
                                 'id'=>'from_date',
                                 'autocomplete'=>'off',
                                 'width'=>'100%','placeholder' =>trans('message.commons.to_date')])
                         !!}
                    </div>
                    <div class="form-group col-md-6 {{setFont()}}">
                        {!!Form::text('to_date',
                                 Request::get('to_date'),['class'=>'form-control englishDatePicker',
                                 'id'=>'to_date',
                                 'autocomplete'=>'off',
                                 'width'=>'100%','placeholder' =>trans('message.commons.to_date')])
                         !!}
                    </div>
                </div>


                <div class="modal-footer justify-content-center {{setFont()}}">
                    @include('backend.components.buttons.filterAction')
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
