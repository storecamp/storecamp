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
        <span class="mailbox-attachment-name" style="text-align: left; clear: both; float:left; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: 400;"><i
                    class="fa fa-paperclip"></i>
            {{$file->filename}}
        </span>
        <span class="mailbox-attachment-size" style="text-align: left; clear: both; float:left; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: 400;">
                                {{ formatBytes($file->size)}}
                            </span>
        <div class="form-group">
            <strong class="text-info" style="color: #3c8dbc!important;text-align: left; clear: both; float:left; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: 400;">{{ $file->aggregate_type }}</strong>
            <label for="{{ $file->id }}" class="pull-right">
                {{ Form::checkbox('selectedFile[]', null, null, ['class' => 'minimal pull-right selectedFile', 'id' => $file->id]) }}
            </label>
        </div>
    </div>
</div>