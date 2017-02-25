@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
    <div class="ui {{ Session::get('flash_notification.level') }} message">
      <i class="close icon icon-close"></i>
      <div class="header text-{{ Session::get('flash_notification.level') }}">
        @if(Session::get('flash_notification.level') == "info")
        - Consider!
        @endif
        @if(Session::get('flash_notification.level') == "warning")
        - Warning!
        @endif
        @if(Session::get('flash_notification.level') == "success")
        - Everything's OK.
        @endif
        @if(Session::get('flash_notification.level') == "error")
        - Bad news!
        @endif
      </div>
      <ul class="list">
        <li>{!! Session::get('flash_notification.message') !!}</li>
    </ul>
  </div>
    @endif
@endif
