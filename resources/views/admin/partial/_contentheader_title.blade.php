@section('contentheader_title')
    {{ strtoupper($message) }} -
    <span class="pull-right-container">
        @if($model)
            <small class="label bg-blue text-sm">{{ $model->toArray()['total'] }}</small>
        @endif
    </span>
@endsection