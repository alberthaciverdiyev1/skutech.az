<div class="box-select">
    <h5>@lang('Body type')</h5>
    <div class="nice-select" tabindex="0">
        <span class="current">@lang('Select body type')</span>
        <ul class="list">
            @forelse($body_types as $key => $item)
                <li data-value="{{$item->key}}" class="option">{{$item->label}}</li>
            @empty
                <li class="option"> @lang('No Data')</li>
            @endforelse

        </ul>
    </div>
</div>
