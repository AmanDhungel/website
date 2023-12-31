<a href="{{url($page_url)}}"
   class="btn btn-secondary btn-sm float-left rounded-pill  boxButton {{setFont()}}"
   data-toggle="tooltip"
   title="{{trans('message.button.list')}}"
>
    <i class="fa fa-list"></i>
    {{trans('message.button.list')}}
</a>

<button class="btn btn-info btn-sm float-right rounded-pill {{setFont()}}"
        data-toggle="modal"
        data-target="#searchModal"
        title="{{ trans('message.button.filter') }}">
    <i class="fas fa-filter"></i>
    {{ trans('message.button.filter') }}
</button>

@if( $request->name !=null || $request->status !=null || $request->province_code !=null ||
$request->district_ode !=null  || $request->local_body_code !=null || $request->role_id !=null
 || $request->login_user_name != null || $request->mobile_no != null || $request->email != null
)

    <a href="{{url(@$page_url)}}"
       class="btn btn-secondary btn-sm float-right boxButton rounded-pill {{setFont()}}"
       title="{{ trans('message.button.reload') }}"
    >
        <i class="fas  fa-undo"></i>
        {{ trans('message.button.reload') }}
    </a>

@endif

@if(allowAdd())

    @if(@$create_menu ==true)

        <a href="{{url(@$page_url .'/create')}}"
           class="btn btn-primary btn-sm float-left boxButton boxButton rounded-pill {{setFont()}}"
           title="{{trans('message.button.add_new')}}"
        >
            <i class="fa fa-plus-circle"></i>
            {{trans('message.button.add_new')}}
        </a>
    @else
        <button
                class="btn btn-primary btn-sm float-left boxButton rounded-pill {{setFont()}}"
                data-toggle="modal"
                data-target="#addModal"
                title="{{trans('message.button.add_new')}}"
        >
            <i class="fa fa-plus-circle"></i>
            {{trans('message.button.add_new')}}
        </button>

    @endif
@endif