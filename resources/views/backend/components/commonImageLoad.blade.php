<img src="{{asset('/storage/'.$filePath.'/'.$data->image)}}"
     alt="User"
     class="rounded-pill"
     style="width: 60px; height: 60px"
>
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