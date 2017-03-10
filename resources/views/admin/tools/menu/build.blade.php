<ol class="dd-list">
@foreach ($items->sortBy('order') as $item)
    <li class="dd-item" data-id="{{ $item->id }}">
        <div class="pull-right item_actions">
            <div class="btn btn-sm btn-danger pull-right delete" data-id="{{ $item->id }}">
                <i class="fa fa-trash-o"></i> Delete
            </div>
            <div class="btn btn-sm btn-primary pull-right edit"
                data-id="{{ $item->id }}"
                data-title="{{ $item->title }}"
                data-target="{{ $item->target }}"
                data-icon_class="{{ $item->icon_class }}"
                data-color="{{ $item->color }}"
                data-route="{{ $item->route }}"
                data-parameters="{{ htmlspecialchars(json_encode($item->parameters)) }}"
            >
                <i class="fa fa-pencil-square-o"></i> Edit
            </div>
        </div>
        <div class="dd-handle">
            <small class="color" style="display:block;width:10px; left: 5px;
            top: 20px; position:absolute; height: 10px; border: 1px solid white; border-radius: 50%; background: {{$item->color ?? 'white'}}"></small>

            {{ $item->title }} <small class="url">{{ $item->route }}</small>
        </div>
        @if(!$item->children->isEmpty())
            @include('admin.tools.menu.build', ['items' => $item->children, ])
        @endif
    </li>
@endforeach
</ol>