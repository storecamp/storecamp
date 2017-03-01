<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> {{$navigation['locale']}} <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        @foreach(config('laravellocalization.supportedLocales') as $key => $value)
            @if($navigation['locale'] == $key)
                <li class="active"><a href="{{route('site::toggleLanguage', [$key])}}">{{$value['name']}}</a></li>
            @else
                <li><a href="{{route('site::toggleLanguage', [$key])}}">{{$value['name']}}</a></li>
            @endif
        @endforeach
    </ul>
</li>