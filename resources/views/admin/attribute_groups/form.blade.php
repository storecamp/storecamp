<div class="tab-pane active" id="general">
    @if(isset($model))
        {{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin::attribute_groups::update', $model->unique_id]]) }}
    @else
        {{ Form::open(['files' => true, 'route' => 'admin::attribute_groups::store']) }}
    @endif
    <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        {!!  $errors->first('name', '<div class="text-danger">:message</div>')  !!}
    </div>

    <div class="form-group">
        {{ Form::label('sort_order', 'Sort Order:') }}
        {{ Form::number('sort_order', isset($model) ? $model->sort_order : 0, ['class' => 'form-control']) }}
        {!! $errors->first('sort_order', '<div class="text-danger">:message</div>')  !!}
    </div>
    <div class="form-group">
        {{ Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) }}
    </div>
    {{ Form::close() }}
</div>