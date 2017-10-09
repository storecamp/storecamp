@if(count($messages))
    @foreach($messages->messages->load('user') as $message)
        @include('site.partials.reviews.message-item')
    @endforeach
@endif