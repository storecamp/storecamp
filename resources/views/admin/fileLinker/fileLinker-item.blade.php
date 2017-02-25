<div data-disk="{{ $disk }}"
     data-file-id="{{ $file->id }}"
     data-href="{{$file->getUrl()}}"
     data-file-name="{{ $file->filename }}"
     class="col-xs-12 col-sm-6 col-md-4 col-lg-3 file-item"
     style="margin-bottom: 10px">
    <span class="mailbox-attachment-icon">
        @if($file->aggregate_type == "image")
            <img src="{{ $file->getUrl() }}" class="item-icon" alt="{{$file->filename}}">
            @else
            <i class="{{ $icon }}"></i>
        @endif
    </span>
    <div class="mailbox-attachment-info">
        <span class="mailbox-attachment-name"><i
                    class="fa fa-paperclip"></i>
            {{$file->filename}}
        </span>
        <span class="mailbox-attachment-size">
                                {{ formatBytes($file->size)}}
                            </span>
        <div class="form-group">
            <strong class="text-info">{{ $file->aggregate_type }}</strong>
            <label for="{{ $file->id }}" class="pull-right">
                {{ Form::checkbox('selectedFile[]', null, null, ['class' => 'minimal pull-right selectedFile', 'id' => $file->id]) }}
            </label>
        </div>
    </div>
</div>