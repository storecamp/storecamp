<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> {{App::getLocale()}} <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        @foreach(config('app.languages') as $key => $value)
            <li><a href="{{route('site::toggleLanguage', [$value])}}">{{$value}}</a></li>
        @endforeach
    </ul>
</li>