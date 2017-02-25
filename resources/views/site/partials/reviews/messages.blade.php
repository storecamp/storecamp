@if(count($messages))
    @foreach($messages->messages as $message)
        @include('site.partials.reviews.message-item')
    @endforeach
@endif