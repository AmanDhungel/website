<div class="modal fade"
     id="statusModal{{$key}}"
     aria-hidden="true"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center modal-content-radius">
            <div class="modal-header btn-primary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    @if(systemSetting())
                        {{  systemSetting()->app_short_name }}
                    @else
                        {{trans('message.pages.common.app_short_name')}}
                    @endif
                </h4>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::open(['method' => 'POST',
                      'class'=>'inline',
                      'id'=>'statusUpdate',
                      'url'=>[$page_url. '/'.'status/'.$data->id]])
            !!}

            <div class="modal-body">
                @if($data->status == 1)
                    <input type="hidden"
                           name="status"
                           value="0"
                    >
                    <h5 class="{{setFont()}}">
                      {{trans('message.commons.are_you_sure_you_want_to_inactive')}}
                    </h5>
                @else
                    <input type="hidden"
                           name="status"
                           value="0"
                    >
                    <h5 class="{{setFont()}}">
                        {{trans('message.commons.are_you_sure_you_want_to_active')}}
                    </h5>
                @endif
            </div>
            <div class="modal-footer justify-content-center {{setFont()}}">
                <button type="submit"
                        class="btn btn-primary rounded-pill"
                >
                    <i class="fa fa-check-circle"></i>
                    {{trans('message.button.yes')}}
                </button> &nbsp; &nbsp;
                <button type="button"
                        class="btn btn-danger rounded-pill"
                        data-dismiss="modal"
                >
                    <i class="fa fa-times-circle"></i>
                    {{trans('message.button.no')}}
                </button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
