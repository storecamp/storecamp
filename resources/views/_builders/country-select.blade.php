<div class="ui fluid country-select search normal selection dropdown">
    <input type="hidden" name="country" value="{{ isset($selected) ? strtoupper($selected) : null }}">
    <i class="dropdown icon"></i>
    <div class="default text">@if(!isset($placeholder)) {!! trans('forms.select-country') !!}@else {{$placeholder}} @endif</div>
    <div class="menu">
        @foreach( $result as $code => $country)
                <div class="item {{ strtolower($selected) == strtolower($code) ? "active selected" : null }}" data-value="{{$code}}"><i
                            class="{{strtolower($code)}} flag"></i>{{$country}}</div>
                @endforeach
    </div>
</div>
