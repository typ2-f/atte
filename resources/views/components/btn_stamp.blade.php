@if($detect)
    <button type="submit" class="btn-stamp">
        {{$slot}}
    </button>
@else
    <button type="submit" class="btn-stamp" disabled>
        {{$slot}}
    </button>
@endif
