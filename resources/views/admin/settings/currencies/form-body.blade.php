<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
            {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::label('code', 'Code*', ['class' => 'control-label']) !!}
            {!! Form::text('code', old('code'), ['class' => 'form-control', 'placeholder' => '']) !!}
            {!! $errors->first('code', '<div class="text-danger">:message</div>') !!}

        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::label('sign', 'Sign*', ['class' => 'control-label']) !!}
            {!! Form::text('sign', old('Sign'), ['class' => 'form-control', 'placeholder' => '']) !!}
            {!! $errors->first('sign', '<div class="text-danger">:message</div>') !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::label('main', 'Main currency', ['class' => 'control-label']) !!}
            @if(isset($currency))
                {!! Form::hidden('main_old', $currency->main) !!}
                {!! Form::checkbox('main', 1, old('main', $currency->main), ['class' => 'minimal']) !!}
            @else
                {!! Form::checkbox('main', 1, old('main', 0), ['class' => 'minimal']) !!}
            @endif
            {!! $errors->first('main', '<div class="text-danger">:message</div>') !!}
        </div>
    </div>
</div>