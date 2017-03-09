<ul class="nav navbar-nav">

@foreach ($items->sortBy('order') as $item)
    
    @php
        // TODO - still a bit ugly - can move some of this stuff off to a helper in the future.
        $listItemClass = [];
        $styles = null;
        $linkAttributes = null;

        if(url($item->link()) == url()->current()){
            array_push($listItemClass,'active');
        }

        // With Children Attributes
        if(!$item->children->isEmpty()) {
            $linkAttributes =  'href="#' . str_slug($item->title, '-') .'-dropdown-element" data-toggle="collapse"';
            array_push($listItemClass,'dropdown');
        }else{
            $linkAttributes =  'href="' . url($item->link()) .'"';
        }

        $listItemClass = implode(" ",$listItemClass);

        // Permission Checker
        $self_prefix = str_replace('/', '\/', $options->user->prefix);
        $slug = str_replace('/', '', preg_replace('/^\/'.$self_prefix.'/', '', $item->link()));

        if ($slug != '') {
          return $value->key == 'browse_'.$slug && is_null($value->table_name);
        }
        
    @endphp

    <li class="{{ $listItemClass }}">
        <a {!! $linkAttributes !!} target="{{ $item->target }}">
            <span class="icon {{ $item->icon_class }}"></span>
            <span class="title">{{ $item->title }}</span>
        </a>
        @if(!$item->children->isEmpty())
        <div id="{{ str_slug($item->title, '-') }}-dropdown-element" class="panel-collapse collapse">
            <div class="panel-body">
                @include('admin.tools.menu.admin_menu', ['items' => $item->children, 'options' => $options, 'innerLoop' => true])
            </div>
        </div>
        @endif
    </li>
@endforeach

</ul>
