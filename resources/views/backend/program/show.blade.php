<div class="modal fade"
     id="showModal{{$key}}"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-secondary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    {{  $data->title  }}    {{  'Event' }} {{trans('message.pages.roles.details')}}
                </h4>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="">
                            Title
                        </label>
                        @if(isset($data->title))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->title  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>

                    <div class="form-group col-md-6 {{setFont()}}">
                        <label for="">
                            Program Type
                        </label>
                        @if(isset($data->type_id))
                            <input type="text"
                                   class="form-control"
                                   value="{{ @$data->type->name  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>

                    <div class="form-group col-md-12 {{setFont()}}">
                        <label for="">
                            Description
                        </label>

                        @if(isset($data->description))
                            {!! $data->description !!}
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>
                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            Start Date
                        </label>
                        @if(isset($data->start_date))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->start_date  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>

                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            End Date
                        </label>
                        @if(isset($data->end_date))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->end_date  }}"
                                   readonly
                            >
                        @else
                            <input type="text"
                                   class="form-control"
                                   value="" readonly
                            >

                        @endif
                    </div>


                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            {{trans('message.commons.status')}}
                        </label>
                        <input type="text"
                               class="form-control"
                               value="{{ $data->status == 1 ? trans('message.button.active') : trans('message.button.inactive') }}"
                               readonly
                        >
                    </div>
                    @if($data->image !=null)
                        <div class="form-group col-md-4 {{setFont()}}">
                            <label for="">
                                Uploaded Image
                            </label>
                            <br>

                            <a href="{{URL::to('/storage/'.$filePath.'/'.$data->image)}}"
                               target="_blank"
                               class="btn btn-secondary btn-xs rounded-pill"
                               data-placement="top" title="{{trans('message.pages.common.viewFile')}}"
                               style="margin: 10px 0 0 10px;"
                            >
                                <i class="fa fa-eye"></i>
                            </a>
                            &nbsp;

                            <a href="{{URL::to('/storage/'.$filePath.'/'.$data->image)}}"
                               target="_blank"
                               class="btn btn-danger btn-xs rounded-pill"
                               data-placement="top" title="Download Image"
                               style="margin: 10px 0 0 10px;"
                               download=""
                            >
                                <i class="fa fa-download"></i>
                            </a>

                        </div>
                    @endif
                    @include('backend.components.actionBy.createdBy')
                    @include('backend.components.actionBy.updatedBy')


                </div>


                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger rounded-pill {{setFont()}}"
                            data-dismiss="modal">
                        <i class="fa fa-times-circle"></i>
                        {{trans('message.button.close')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
