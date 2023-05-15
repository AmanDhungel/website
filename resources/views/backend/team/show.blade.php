<div class="modal fade"
     id="showModal{{$key}}"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-secondary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    {{  $data->header_title  }}    {{  'Banner' }} {{trans('message.pages.roles.details')}}
                </h4>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-4 {{setFont()}}">
                        <label for="">
                            Full Name
                        </label>
                        @if(isset($data->full_name))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->full_name  }}"
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
                           Designation
                        </label>
                        @if(isset($data->designation->name))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->designation->name  }}"
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
                           Address
                        </label>
                        @if(isset($data->address))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->address  }}"
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
                           Contact Number
                        </label>
                        @if(isset($data->contact_number))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->contact_number  }}"
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
                           Contact Email Address
                        </label>
                        @if(isset($data->contact_email))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->contact_email  }}"
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
                          Facebook Link
                        </label>
                        @if(isset($data->facebook_link))

                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->facebook_link  }}"
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
                          Instagram Link
                        </label>
                        @if(isset($data->insta_link))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->insta_link  }}"
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
                           Twitter Link
                        </label>
                        @if(isset($data->twitter_link))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->twitter_link  }}"
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
                           Linkedin Link
                        </label>
                        @if(isset($data->linkedin_link))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->linkedin_link  }}"
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
                            Order
                        </label>
                        @if(isset($data->order))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->order  }}"
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
