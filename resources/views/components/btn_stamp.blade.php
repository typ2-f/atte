@if($detect)
    <button type='submit' class='btn-stamp' name='stamp-ok' >
        {{$slot}}
    </button>
@else
    <button type='submit' class='btn-stamp' name='stamp-ng' disabled>
        {{$slot}}
    </button>
@endif
