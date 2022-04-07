@if($detect)
    <button type="submit" class="btn-stamp" id="ok" >
        {{$slot}}
    </button>
@else
    <button type="submit" class="btn-stamp" id="ng" disabled>
        {{$slot}}
    </button>
@endif
