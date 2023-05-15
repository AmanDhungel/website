@if(isset($data->createdBy))
    @php
        if(userInfo()->id == $data->created_by){
           $user =  'You';
        }else{
            $user = $data->createdBy->full_name;
        }
    @endphp

    <div class="form-group col-md-6 {{setFont()}}">
        <label for="">
          Created By
        </label>
        <input type="text"
               class="form-control"
               value="{{ $user }}  {{$data->created_at}} {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}"
               readonly
        >

    </div>
@endif