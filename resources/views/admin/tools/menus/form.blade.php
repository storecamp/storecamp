@if(isset($menu))
    {{ Form::model($menu, ['route' => ['admin::design::menus::update', $menu->id], 'method' => 'PUT', 'files' => false]) }}
@else
    {{ Form::open(['files' => false, 'route' => 'admin::design::menus::store']) }}
@endif
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#general" data-toggle="tab">General</a></li>
        {{--<li><a href="#extra" data-toggle="tab">Extra</a></li>--}}
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="general">
            <div class="form-group">
                {{ Form::label('name', 'Name of Menu:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                {{ $errors->first('name', '<div class="text-danger">:message</div>') }}
            </div>
            @if(isset($menu))
                <div class="form-group">
                    {{ Form::submit(isset($menu) ? 'Update' : 'Create', ['class' => 'btn btn-primary']) }}
                </div>
            @endif
        </div>
    </div>
</div>
{{ Form::close() }}