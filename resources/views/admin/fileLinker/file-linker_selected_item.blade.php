<div data-id="{{ $file->id }}" data-href="{{ $file->getUrl() }}" class="col-xs-4 col-md-3 col-lg-2 selected-item" style="text-align: left;font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;">
    @if($file->aggregate_type == "image")
        <img src="{{ $file->getUrl() }}" class="item-icon" alt="{{$file->filename}}">
    @else
        <i class="{{ $icon }}"></i>
    @endif
    <strong class="text-muted"><i class="fa fa-paperclip"></i>
        {{ $file->filename }}
    </strong>
</div>