@if(isset($role))
    {{ Form::model($role, ['route' => ['admin::roles::update', $role->id], 'method' => 'PUT', 'files' => true]) }}
    @if($role->isAppsDefault())
        <h4 class="text-warning">The role is default for app - <b class="text-danger">no actions can be performed</b>
        </h4>
    @endif
@else
    {{ Form::open(['files' => true, 'route' => 'admin::roles::store']) }}
@endif
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#general" data-toggle="tab">General</a></li>
        {{--<li><a href="#extra" data-toggle="tab">Extra</a></li>--}}
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="general">

            <div class="form-group">
                {{ Form::label('name', 'Name of role:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                {{ $errors->first('name', '<div class="text-danger">:message</div>') }}
            </div>

            <div class="form-group">
                {{ Form::label('display_name', 'Alias of role:') }}
                {{ Form::text('display_name', null, ['class' => 'form-control']) }}
                {!! $errors->first('display_name', '<div class="text-danger">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description:') }}
                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                {!! $errors->first('description', '<div class="text-danger">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('permissions', 'Permissions:') }}
                {!! buildSelect(route('admin::roles::permissions::json'), 'permissions[]', true, $permissions, $selectedPerms, "selector", "please choose your role") !!}
                {!! $errors->first('permissions[]', '<div class="text-danger">:message</div>') !!}
            </div>

            @if(isset($role))
                @if(!$role->isAppsDefault())
                    <div class="form-group">
                        {{ Form::submit(isset($role) ? 'Update' : 'Create', ['class' => 'btn btn-primary']) }}
                    </div>
                @endif

             @else
                <div class="form-group">
                    {{ Form::submit(isset($role) ? 'Update' : 'Create', ['class' => 'btn btn-primary']) }}
                </div>
            @endif
        </div>
    </div>
</div>
{{ Form::close() }}