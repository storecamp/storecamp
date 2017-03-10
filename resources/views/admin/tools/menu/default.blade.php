@if(!isset($innerLoop))
    <div class="menu">
        <ul class="default-menu treeview-menu">
   @else
        <ul class="treeview-menu">
@endif
        @foreach ($items->sortBy('order') as $item)
            @php

                $isActive = null;
                $styles = null;
                $icon = null;

                // Background Color or Color
                if (isset($options->color) && $options->color == true) {
                    $styles = 'color:'.$item->color;
                }
                if (isset($options->background) && $options->background == true) {
                    $styles = 'background-color:'.$item->color;
                }

                // Check if link is current
                if(url($item->link()) == url()->current()){
                    $isActive = 'active';
                }

                // Set Icon
                if(isset($options->icon) && $options->icon == true){
                    $icon = '<i class="' . $item->icon_class . '"></i>';
                }

            @endphp

            <li class="treeview item {{ $isActive }}">
                <a href="{{ url($item->link()) }}" target="{{ $item->target }}" class="link" style="{{ $styles }}">
                    {!! $icon !!}
                    <span>{{ $item->title }}</span>
                </a>
                @if(!$item->children->isEmpty())
                    @include('admin.tools.menu.default', ['items' => $item->children, 'options' => $options,  'innerLoop' => true])
                @endif
            </li>
        @endforeach
@if(!isset($innerLoop))
        </ul>
    </div>
    @else
    </ul>
@endif