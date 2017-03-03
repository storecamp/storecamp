<div class="col-lg-4 col-md-4 col-sm-4 xs-4">
    <div class="like">
        <span class="label label-info pull-right">
            {{$model->getLikeCount()}}
        </span>
        <a data-base-url="{{$route}}"
           href="{{$route}}"
           data-button-ID=$('like')
           data_class_name="{{getBaseClassName($model)}}"
           data_object_id="{{$model->id}}"
           class="like-btn btn btn-default pull-right">
            @if($model->liked(Auth::user()))
                <span class="text-muted like-message"></span>
            @endif
            @if($model->liked(Auth::user()))
                <i class="fa fa-heart text-danger "></i>
            @else
                <i class="fa fa-heart-o"></i>
            @endif
        </a>
    </div>
</div>