<div class="modal fade"
     id="showModal{{$key}}"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-secondary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    {{  $data->menu_name  }} {{trans('message.pages.roles.details')}}
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
                            Parent Menu
                        </label>
                        @if(isset($data->parent_id) && $data->parent_id!=null)
                            @php
                            $parentMenu=$commonRepo->getParentMenu($data->parent_id);
                            @endphp
                            <input type="text"
                                   class="form-control"
                                   value="{{  @$parentMenu->menu_name  }}"
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
                            Menu Name
                        </label>
                        @if(isset($data->menu_name))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->menu_name  }}"
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
                            Menu Type
                        </label>
                        @if(isset($data->menu_type))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->menu_type  }}"
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
                            Menu Url
                        </label>
                        @if(isset($data->menu_url))
                            <input type="text"
                                   class="form-control"
                                   value="{{  $data->menu_url  }}"
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
                            Display Order
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
