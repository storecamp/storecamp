<nav class="site_sidebar" data-active-parents="true">
    <ul>
        <li class="sidebar-label">Navigation</li>
        @foreach($categories as $category)
            @if(!$category->parent_id)
                <?php $children = $category->children; ?>
                <li class="{{$children  ? 'has-children' : ''}}">
                    <a href="{{route('site::products::index', [$category->unique_id])}}">
                        <i class="fa fa-link"></i>
                        <span class="count">{{count($children)}}</span>
                        {{$category->name}}
                    </a>
                    @if($children)
                        <ul class="item" style="">
                            @foreach ($children as $child)
                                <li>
                                    <a href="{{route('site::products::index', [$child->unique_id])}}">
                                        <i class="fa fa-link"></i>
                                        <span>{{$child->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
    <ul>
        <li class="sidebar-label">Action</li>
        <li class="action-btn"><a href="#0">+ Button</a></li>
    </ul>
</nav>
@push('scripts-add_on')
<script src="{{asset('custom_vendors/site_sidebar/modernizr.js')}}"></script>
<script src="{{asset('custom_vendors/site_sidebar/jquery.menu-aim.js')}}"></script>
<script src="{{asset('custom_vendors/site_sidebar/index.js')}}"></script> <!-- Resource jQuery -->
@endpush