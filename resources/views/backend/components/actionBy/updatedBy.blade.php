@if(isset($data->updatedBy))
    @php
        if(userInfo()->id == $data->updated_by){
           $user =  'You';
        }else{
            $user = $data->updatedBy->full_name;
        }
    @endphp

    <div class="form-group col-md-6 {{setFont()}}">
        <label for="">
            Updated By
        </label>
        <input type="text"
               class="form-control"
               value="{{ $user }}  {{$data->created_at}} {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}"
               readonly
        >

    </div>
@endif
