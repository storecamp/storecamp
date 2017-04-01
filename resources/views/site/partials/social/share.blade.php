@push('meta_headers')
<meta property="og:description" content="{{$description}}" />
<meta property="og:title" content="{{$name}}" />
<meta property="og:url" content="{{urlencode($url)}}" />
<meta property="og:image" content="{{$image}}" />
@endpush
<ul class="product-social-list">
    <li>
        <span>Share</span>
    </li>
    <li>
        <a class="btn btn-social-icon btn-facebook"
           href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}&title={{$name}}&description={{$description}}&image={{$image}}"
           target="_blank">
            <i class="fa fa-facebook-official"></i>
        </a>
    </li>
    <li>
        <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{$name}}&hashtags={{urldecode('storecamp,store,market')}}"
           target="_blank">
            <i class="fa fa-twitter-square"></i>
        </a></li>
    <li>
        <a class="btn btn-social-icon btn-google" href="https://plus.google.com/share?url={{ urlencode($url) }}&text={{$name}}'  '{{$description}}&image={{$image}}"
           target="_blank">
            <i class="fa fa-google-plus-square"></i>
        </a>
    </li>
    <li>
        <a class="btn btn-social-icon btn-pinterest" href="https://pinterest.com/pin/create/button/?{{
        http_build_query([
            'url' => $url,
            'media' => $image,
            'description' => $description
        ])
        }}" target="_blank">
            <i class="fa fa-pinterest-square"></i>
        </a>
    </li>
</ul>
