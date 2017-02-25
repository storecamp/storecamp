<div class="category nav nav-pills nav-stacked">
    @foreach($categories as $category)
        <?php $existsCategory = $chosenCategory ? $chosenCategory->id !== $category->id : true; ?>
        @if(!$category->parent_id && $existsCategory)
            <?php $children = $category->children; ?>
            <li class="treeview category-treeview">
                <a class="btn btn-app choose-parent {{$parent ? $parent->id == $category->id ? "active": "" : ""}}" role="button"
                   data-choose-name="{{$category->name}}"
                   data-choose-id="{{$category->id}}"
                >
                    <i class="fa fa-link"></i>
                    <span class="badge bg-green">{{count($children)}}</span>
                    <span class="">
                        {{$category->name}}
                    </span>
                        <b class="text-muted pull-right">choose parent</b>
                </a>
                {{--@if(count($children))--}}
                    {{--<ul class="treeview-menu nav nav-pills nav-stacked" style="display:none">--}}
                        {{--@foreach ($children as $child)--}}
                            {{--<li>--}}
                                {{--<a class="btn btn-app {{$parent->id == $child->id ? "active": ""}}">--}}
                                    {{--<i class="fa fa-link"></i> {{$child->name}}--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--@endif--}}
            </li>
        @endif
    @endforeach
</div>
