<ul class="products-list product-list-in-box">
    @foreach($audits as $audit)
        <li class="item">
            <div class="product-info">
                <a href="javascript:void(0)" class="product-title">
                    @if($audit->type == "created")
                        <span class="label label-success pull-right"><span class="text-muted">action type </span> {{ $audit->type }}</span>
                    @endif
                    @if($audit->type == "updated")
                        <span class="label label-info pull-right"><span class="text-muted">action type </span> {{ $audit->type }}</span>
                    @endif
                    @if($audit->type == "deleted")
                        <span class="label label-danger pull-right"><span class="text-muted">action type </span> {{ $audit->type }}</span>
                    @endif
                    <div class="add-info">
                        <small class="label bg-blue item">route: {{ $audit->route }}</small>
                        <small class="label bg-green item">ip: {{ $audit->ip_address }}</small>
                        <small class="label bg-yellow item">changed: {{ $audit->created_at }}</small>
                        <small class="label bg-red item">user:
                            @if($audit->auditor())
                                {{ $audit->auditor()->name }}
                            @else
                                No User Provided
                            @endif
                        </small>
                    </div>
                </a>
                <span class="product-description">
                    <h1 class="text-center"><small class="text-muted">changed:</small></h1>
                    <p class="text-muted changed">
                        @if(empty($audit->old))
                        <textarea class="form-control" disabled name="old" id="" cols="30" rows="1">
                            nothing changed
                        </textarea>
                        @else
                        <textarea class="form-control" disabled name="old" id="" cols="30" rows="3">
                            {{ json_encode($audit->old) }}
                        </textarea>
                        @endif
                    </p>
                    <h1 class="text-center"><small class="text-muted">to:</small></h1>
                    <p class="text-muted changed">
                         <textarea class="form-control" disabled name="new" id="" cols="30" rows="3">
                             {{ json_encode($audit->new) }}
                        </textarea>
                    </p>
                </span>
            </div>
        </li>
@endforeach
<!-- /.item -->
</ul>
