<div class="modal fade"
     id="orderModal{{$key}}"
     aria-hidden="true"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-primary rounded-pill">
                <h4 class="modal-title">
                    @if(systemSetting())
                        {{ systemSetting()->app_short_name }}
                    @else
                        {{trans('message.pages.common.app_short_name')}}
                    @endif
                </h4>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['method' => 'POST',
                    'class'=>'inline', 'url'=>[$page_url. '/order/'.$data->id]])
            !!}
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>
                            Existing Order
                        </label>
                        <input type="number"
                               class="form-control"
                             value="{{$data->order}}"
                               readonly
                        >
                    </div>
                    <div class="form-group col-md-12">
                        <label>
                          New Order
                        </label>
                        <label class="text text-danger">
                            *
                        </label>
                        <input type="number"
                               class="form-control"
                               name="order"
                               required min="1"
                        >
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center {{setFont()}}">
                <button type="submit"
                        class="btn btn-success rounded-pill"
                >
                    <i class="fa fa-check-circle"></i>
                    {{trans('message.button.update')}}
                </button> &nbsp; &nbsp;
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>