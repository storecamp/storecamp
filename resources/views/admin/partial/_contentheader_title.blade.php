@section('contentheader_title')
    {{ strtoupper($message) }} -
    <span class="pull-right-container">
        @if($model)
            @if(!empty($total))
                <small class="label bg-blue text-sm">{{ $total }}</small>
                @else
                <small class="label bg-blue text-sm">{{ $model->count() }}</small>
            @endif
        @endif
    </span>
@endsection