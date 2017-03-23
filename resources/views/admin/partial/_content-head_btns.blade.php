<div class="btn-group" style="">
        <?php $class = isset($classBtn) ? 'btn btn-info '.$classBtn : 'btn btn-info'; ?>
    {{ link_to_route($routeName, $createBtn, [], ['class' => $class ]) }}
    <?php $showFilters = isset($showFilters) ? $showFilters : true; ?>
    @if($showFilters)
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <i class="fa fa-filter fa-fw"></i> Options <span class="fa fa-angle-down"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <?php $filters = isset($filters) ? $filters : []; ?>
            @forelse($filters as $filter)
                <li><a href="#"><span class="fa fa-circle-o fa-fw text-danger"></span> Important</a></li>
            @empty
            @endforelse
        </ul>
    @endif
        @yield('head_btn-group')
</div>