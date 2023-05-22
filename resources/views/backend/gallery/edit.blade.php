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
                                'placeholder'=>'Enter Title',
                                'autocomplete'=>'off',
                                'required'
                                ])
                        !!}
                    </div>
{{--                    <div class="form-group col-md-6">--}}
{{--                        <label for="inputName">--}}
{{--                            Order--}}
{{--                            <span class="text text-danger">--}}
{{--                                    *--}}
{{--                                </span>--}}
{{--                        </label>--}}
{{--                        {!! Form::number('order',null,--}}
{{--                                ['class'=>'form-control',--}}
{{--                                'placeholder'=>'Order',--}}
{{--                                'autocomplete'=>'off',--}}
{{--                                'required',--}}
{{--                                'min'=>'1'--}}
{{--                                ])--}}
{{--                        !!}--}}
{{--                    </div>--}}

                    @if($data->image !=null)
                        <div class="form-group col-md-4 {{setFont()}}">
                            <label for="">
                                Uploaded File
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

                            <a href="{{URL::to('/storage/'.$filePath.'/'.$data->file)}}"
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

                    <div class="form-group col-md-6">

                        <label for="image">
                            Image
                        </label>
                        <input type="file"
                               class="form-control-file profile-img"
                               accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG"
                               name="image"
                        >

                        @if($errors->has('image') == null)
                            <span class="text text-danger"
                                  style="font-size: 14px;color: #ff042c"
                            >
                              {{trans('message.pages.users_management.file_upload_message')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 {{setFont()}}">
                        <label>
                           Is Banner ?
                        </label>
                        <br>
                        <input class="radio-button"
                               type="radio"
                               name="is_banner_image"
                               @if($data->is_banner_image == true) checked @endif
                               value="1"
                               style="margin-top: 2px"
                        >
                        Yes
                        &nbsp; &nbsp;
                        <input class="radio-button"
                               type="radio"
                               name="is_banner_image"
                               @if($data->is_banner_image == false) checked @endif
                               value="0" style="margin-top: 2px"
                        >
                      No
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
