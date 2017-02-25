<div class="btn-group">
    {{ link_to_route($routeName, $createBtn, [], ['class' => 'btn btn-info']) }}
    <?php $showFilters = isset($showFilters) ? $showFilters : true; ?>
    @if($showFilters)
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <i class="fa fa-filter fa-fw"></i> Filters <span class="fa fa-angle-up"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <?php $filters = isset($filters) ? $filters : []; ?>
            @forelse($filters as $filter)
                <li><a href="#"><span class="fa fa-circle-o fa-fw text-danger"></span> Important</a></li>
            @empty
                <li class="text-center text-warning">no filters provided</li>
            @endforelse
        </ul>
    @endif
</div>