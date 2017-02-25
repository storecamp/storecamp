<div class="tab-pane active" id="general">
@if(isset($productReview))
    {{ Form::model($productReview, ['route' => ['admin::reviews::update',
    $productReview->id], 'method' => 'PUT', "role" => "form",'files' => false ]) }}
@else
    {{ Form::open(['route' => ['admin::reviews::store', $product->id], 'method' => 'POST', "role" => "form", ]) }}
@endif
<!-- Message Form Input -->
    <div class="form-group">
        <div class="box-header with-border">
            <h3 class="box-title">
                Product Review for -
                <strong>
                    <span class="text-muted">product - </span>
                    <a href="{{ route("admin::products::show", $product->id) }}">
                        {{$product->title}}
                    </a>
                </strong>
            </h3>
            <div class="box-tools pull-right">
                <label for="hidden" class="pull-left text-info" style="padding: 7px;">visibility filter</label>
                <div class="form-group pull-right" style="width: auto">
                    {{ Form::select('hidden', ["0"=> 'visible', "1"=> 'hidden'], [old('hidden')],
                    ["class" => "form-control pull-right", "id" => "hidden"]) }}
                </div>
                {!! $errors->first('hidden', '<div class="text-danger">:message</div>') !!}
            </div>
            <!-- /.box-tools -->
        </div>
    </div>
    <div class="form-group">
        {{ Form::textarea('review', old('review'), [
        'class' => 'form-control autogrow', "rows" => "6","placeholder"=>"Reply form here.."]) }}
        {!! $errors->first('review', '<div class="text-danger">:message</div>') !!}
    </div>
    <h3 class="text-muted"><b>Product review point</b></h3>
    <div class="col-md-6">
        @include('admin.partial._rating', [$selected = old('rating') ?
        old('rating') : isset($productReview) ? $productReview->rating : null])
        {!! $errors->first('rating', '<div class="text-danger">:message</div>') !!}
    </div>
    <div class="form-group text-right">
        <button class="btn btn-primary">Confirm</button>
    </div>
    {{ Form::close() }}
</div>