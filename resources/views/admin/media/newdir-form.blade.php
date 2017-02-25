{{ Form::open(['files' => false, 'id' => 'newDirForm','route' => ['admin::media::make.directory', $disk]]) }}
<div class="form-group">
    {{ Form::label('path', 'Path:') }}

    <div class="input-group margin">
        <div class="input-group-btn">
            <button type="button" class="btn btn-info disabled">{{ $folder->name ? $folder->name : '../'}}</button>
        </div>
        <!-- /btn-group -->
        {{ Form::text('new_path', null, ['class' => 'form-control folder-new-path']) }}
        {!! $errors->first('new_path', '<div class="text-danger">:message</div>') !!}
        {{ Form::text('folder', $folder->unique_id, ['class' => 'form-control folder-id hidden']) }}    </div>
    {{ Form::submit('confirm folder creation', ['class' => "btn btn-default"]) }}
</div>
{{ Form::close() }}