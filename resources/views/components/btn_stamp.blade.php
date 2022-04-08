@if($detect)
    <button type='submit' class='btn_stamp' name='stamp_ok' >
        {{$slot}}
    </button>
@else
    <button type='submit' class='btn_stamp' name='stamp_ng' disabled>
        {{$slot}}
    </button>
@endif
