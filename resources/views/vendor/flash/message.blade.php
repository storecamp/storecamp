@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php $messages = Session::get('flash_notification.message'); ?>
            @if (count($messages) <= 1)
                {!! $messages !!}
            @else
                @foreach($messages as $message)
                    {!! $message !!}
                @endforeach
            @endif
        </div>
    @endif
@endif
