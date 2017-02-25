<div class="category nav nav-pills nav-stacked">
    @foreach($categories as $category)
            @if(!$category->parent_id)

            <?php $children = $category->children; ?>
            <li class="treeview category-treeview">
            <a class="btn btn-app {{$chosenCategoryId ? $chosenCategoryId == $category->id ? "active": "" : ""}}"
               role="button"
            >
                <i class="fa fa-link"></i>
                <span class="badge bg-green">{{count($children)}}</span>
                <span class="">
                        {{$category->name}}
                    </span>
                <b  data-choose-name="{{$category->name}}"
                    data-choose-id="{{$category->id}}" class="text-muted pull-right choose-category">choose category</b>
            </a>
            @if($children)
                <ul class="treeview-menu nav nav-pills nav-stacked" style="display:none">
                    @foreach ($children as $child)
                        <li>
                            <a class="btn btn-app {{$chosenCategoryId == $child->id ? "active": ""}}">
                                <i class="fa fa-link"></i>
                                <span>{{$child->name}}</span>
                                <b data-choose-name="{{$child->name}}" data-choose-id="{{$child->id}}" class="text-muted pull-right choose-category">choose category</b>

                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
            @endif
    @endforeach
</div>
