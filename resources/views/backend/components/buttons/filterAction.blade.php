<button type="submit"
        id="btn-search"
        class="btn btn-info  rounded-pill"
>
    <i class="fa fa-search"></i>
    {{trans('message.button.filter')}}
</button>
&nbsp;

<button type="button"
        class="btn btn-secondary  rounded-pill"
        onclick="resetForm(event,$(this));"
>
    <i class="fas  fa-sync-alt"></i>
    {{trans('message.button.reset')}}
</button>
&nbsp;
<button type="button"
        class="btn btn-danger  rounded-pill"
        data-dismiss="modal"
>
    <i class="fa fa-times"></i>
    {{trans('message.button.close')}}
</button>