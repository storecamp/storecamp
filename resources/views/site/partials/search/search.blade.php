@if(!empty($results))
    @foreach($results as $result)
        <h1>{{ $result->title }} </h1>
    @endforeach
@else
    <h1 class="text-center text-warning">search for something ...</h1>
@endif
